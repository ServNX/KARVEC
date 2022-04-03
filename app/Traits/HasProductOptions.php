<?php

namespace App\Traits;

trait HasProductOptions
{
    private function getVariantOptionValues($product)
    {
        return $product->variants->pluck('values')->flatten();
    }

    private function getProductOptions($product)
    {
        return $this->getVariantOptionValues($product)->unique('id')->groupBy('product_option_id')
            ->map(function ($values) {
                return [
                    'option' => $values->first()->option,
                    'values' => $values
                ];
            })->values();
    }
}
