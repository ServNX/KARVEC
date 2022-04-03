<?php

namespace App\Services;

use GetCandy\Base\Purchasable;
use GetCandy\Facades\CartSession;

class CartService
{

    public function getCartLines()
    {
        return $this->mappedLines();
    }

    public function getCart()
    {
        return CartSession::current();
    }

    public function forget()
    {
        return CartSession::forget();
    }

    public function getManager()
    {
        return CartSession::manager();
    }

    public function addLine(Purchasable $purchasable, int|string $quantity) {
        return $this->getManager()->add($purchasable, $quantity);
    }

    public function updateLines($lines)
    {
        $this->getManager()->updateLines(
            collect($lines)
        );

        return $this->mappedLines();
    }

    public function removeLine($id)
    {
        $this->getManager()->removeLine($id);
        return $this->mappedLines();
    }

    public function getShippingAddress()
    {
        return $this->getCart()->shippingAddress;
    }

    public function getBillingAddress()
    {
        return $this->getCart()->billingAddress;
    }

    public function setShippingAddress($address) {
        // $address can be either an GetCandy\Models\Address or an Array
        // Fresh cart instance, when setting from CartController.index method we get an Address Model
        // When updating from form.post method coming from Vue (Inertia), we get an Array.
        if (!is_array($address)) {
            $address = $address->toArray();
        }

        $this->getManager()->setShippingAddress(array_merge($address, [
            'meta' => [
                'address_id' => $address['id']
            ]
        ]));

        return $this->getCart();
    }

    public function setBillingAddress($address) {
        // $address can be either an GetCandy\Models\Address or an Array
        // Fresh cart instance, when setting from CartController.index method we get an Address Model
        // When updating from form.post method coming from Vue (Inertia), we get an Array.
        if (!is_array($address)) {
            $address = $address->toArray();
        }

        $this->getManager()->setBillingAddress(array_merge($address, [
            'meta' => [
                'address_id' => $address['id']
            ]
        ]));

        return $this->getCart();
    }

    protected function cartLines()
    {
        return $this->getCart()->lines ?? collect();
    }

    protected function mappedLines()
    {
        return $this->cartLines()->map(function ($line) {
            return [
                'id'          => $line->id,
                'identifier'  => $line->purchasable->getIdentifier(),
                'quantity'    => $line->quantity,
                'description' => $line->purchasable->getDescription(),
                'thumbnail'   => $line->purchasable->getThumbnail(),
                'option'      => $line->purchasable->getOption(),
                'sub_total'   => $line->subTotal->formatted(),
                'unit_price'  => $line->unitPrice->formatted()
            ];
        })->toArray();
    }
}
