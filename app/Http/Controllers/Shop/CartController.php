<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use GetCandy\Facades\ShippingManifest;
use GetCandy\Models\Country;
use GetCandy\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CartController extends Controller
{
    public function __construct(
        private CartService $cartService,
    )
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $cart = $this->cartService->getCart();
        if (!$cart) {
            return Redirect::route('home');
        }

        $customer = Auth::user()->customers()->with(['addresses'])->first();

        // cart already have shipping and billing addresses ?
        $current_shipping_address = $this->cartService->getShippingAddress();
        $current_billing_address = $this->cartService->getBillingAddress();

        // if not, set them to the customers defaults
        if (!$current_shipping_address) {
            $shipping_default_address = $customer->addresses()->whereShippingDefault(true)->first();
            $this->cartService->setShippingAddress($shipping_default_address);
        }
        if (!$current_billing_address) {
            $billing_default_address = $customer->addresses()->whereBillingDefault(true)->first();
            $this->cartService->setBillingAddress($billing_default_address);
        }

        return Inertia::render('Shop/CartPage', [
            'countries'        => Country::with(['states'])->whereIn('iso3', ['USA'])->get(),
            'lines'            => $this->cartService->getCartLines(),
            'addresses'        => $customer->addresses,
            'shipping_address' => $this->cartService->getShippingAddress(),
            'billing_address'  => $this->cartService->getBillingAddress(),
            'amounts'          => [
                'total'    => ['value' => $cart->total->value, 'formatted' => $cart->total->formatted],
                'subtotal' => ['value' => $cart->subTotal->value, 'formatted' => $cart->subTotal->formatted],
                'tax'      => ['value' => $cart->taxTotal->value, 'formatted' => $cart->taxTotal->formatted],
                'discount' => ['value' => $cart->discountTotal->value, 'formatted' => $cart->discountTotal->formatted]
            ]
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id'       => 'required|integer',
            'quantity' => 'required|numeric|min:1|max:10000',
            'buynow'   => 'boolean'
        ]);

        $item = ProductVariant::with(['product'])->find($data['id']);
        $this->cartService->addLine($item, $data['quantity']);

        return Redirect::back();
    }

    public function update(Request $request)
    {
        $lines = $request->validate([
            'lines.*.quantity' => 'required|numeric|min:1|max:10000',
        ]);

        $this->cartService->updateLines($lines);

        return Redirect::route('cart');
    }

    public function remove($id)
    {
        $this->cartService->removeLine($id);

        if (count($this->cartService->getCartLines()) <= 0) {
            $this->cartService->forget();
            return Redirect::route('home');
        }

        return Redirect::route('cart');
    }

    public function updateAddress(Request $request)
    {
        $data = $request->validate([
            'shipping_address' => 'required|array',
            'billing_address'  => 'required|array',
            'type'             => 'required|string',
            'same_address'     => 'required|boolean'
        ]);

        $msg = 'Your address has been updated';

        if ($data['same_address']) {
            $this->cartService->setShippingAddress($data['shipping_address']);
            $this->cartService->setBillingAddress($data['shipping_address']);
            return Redirect::route('cart')->with('success', $msg);
        }

        if ($data['type'] === 'shipping') {
            $this->cartService->setShippingAddress($data['shipping_address']);
            $msg = 'Shipping address has been updated';
        } elseif ($data['type'] === 'billing') {
            $this->cartService->setBillingAddress($data['billing_address']);
            $msg = 'Billing address has been updated';
        }

        if ($data['shipping_address'] === $data['billing_address']) {
            return Redirect::route('cart')->with('info', 'You can now update your billing address');
        }

        return Redirect::route('cart')->with('success', $msg);
    }

    public function purchase(Request $request)
    {
        $data = $request->validate([
            'payment_method_id' => 'string|required'
        ]);

        $user = $request->user();
        $user->createOrGetStripeCustomer();

        $cart = $this->cartService->getCart();

        try {
            $payment = $user->charge(
                $cart->total->value,
                $data['payment_method_id'],
            )->asStripePaymentIntent();

            // todo: for now we only offer Free Shipping, we will integrate shipping package soon
            $option = ShippingManifest::getOptions($cart)->first(function ($opt) {
                return $opt->getIdentifier() == 'FREEDEL';
            });

            $this->cartService->getManager()->setShippingOption($option);

            $order = $this->cartService->getManager()->createOrder();
            $order->update([
                'placed_at' => now(),
                'status'    => 'paid',
            ]);

            $stripe = $payment->charges->data[0];
            $order->transactions()->create([
                'success'   => true,
                'refund'    => false,
                'driver'    => 'stripe',
                'amount'    => $stripe->amount,
                'reference' => $stripe->id,
                'status'    => $stripe->status,
                'notes'     => $stripe->description,
                'card_type' => $stripe->payment_method_details->card->brand,
                'last_four' => $stripe->payment_method_details->card->last4
            ]);

            // clear the cart
            $this->cartService->forget();

            return Redirect::route('order.summary', ['order_id' => $order->id])
                ->with('success', 'Order Complete!');
        } catch (\Exception $e) {
            // redirect to error page ?
            return Redirect::route('cart')->with('error', "Error Processing Order: " . $e->getMessage());
        }
    }
}
