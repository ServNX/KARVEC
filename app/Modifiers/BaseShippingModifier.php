<?php

namespace App\Modifiers;

use GetCandy\Base\ShippingModifier;
use GetCandy\DataTypes\Price;
use GetCandy\DataTypes\ShippingOption;
use GetCandy\Facades\ShippingManifest;
use GetCandy\Models\Cart;
use GetCandy\Models\TaxClass;

class BaseShippingModifier extends ShippingModifier
{
    public function handle(Cart $cart)
    {
        // Get the tax class
        $taxClass = TaxClass::getDefault();

        ShippingManifest::addOption(
            new ShippingOption(
                description: 'Free Delivery',
                identifier: 'FREEDEL',
                price: new Price(0, $cart->currency, 1),
                taxClass: $taxClass
            )
        );

        ShippingManifest::addOption(
            new ShippingOption(
                description: 'Basic Delivery',
                identifier: 'BASDEL',
                price: new Price(1000, $cart->currency, 1),
                taxClass: $taxClass
            )
        );
    }
}
