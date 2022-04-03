<?php

namespace Database\Seeders\App;

use GetCandy\Models\Attribute;
use GetCandy\Models\Product;
use GetCandy\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'LED Sign',
            'Wooden Sign',
            'Wooden Coaster',
            'Wooden Tray'
        ];

        foreach ($types as $type) {
            $attributeIds = Attribute::whereAttributeType(Product::class)->get()->pluck('id');

            $productType = ProductType::create([
                'name' => $type,
            ]);

            $productType->mappedAttributes()->attach($attributeIds);
        }
    }
}
