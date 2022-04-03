<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use GetCandy\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function summary(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required'
        ]);

        $order = Order::findOrFail($data['order_id']);
        $customer = Auth::user()->customers->first();

        $name = $customer->first_name . ' ' . $customer->last_name;

        $lines = $order->lines->map(function ($line) {
            return [
                'id'            => $line->id,
                'identifier'    => $line->identifier,
                'unit_quantity' => $line->unit_quantity,
                'description'   => $line->description,
                'thumbnail'     => $line->type != 'shipping'
                    ? $line->purchasable->getThumbnail()
                    : null,
                'unit_price'    => $line->unit_price,
                'option'        => $line->option
            ];
        })->toArray();

        return Inertia::render('Shop/OrderSummaryPage', [
            'name'     => $name,
            'lines'    => $lines,
            'taxTotal' => $order->tax_total->formatted,
            'total'    => $order->total->formatted
        ]);
    }
}
