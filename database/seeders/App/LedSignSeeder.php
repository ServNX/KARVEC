<?php

namespace Database\Seeders\App;

use GetCandy\Hub\Jobs\Products\GenerateVariants;
use GetCandy\Models\Product;
use GetCandy\Models\ProductOption;
use GetCandy\Models\ProductOptionValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LedSignSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $this->CreateVariants();
        });
    }

    private function CreateVariants()
    {
        $products = Product::with(['productType' => fn ($q) => $q->whereName('LED Sign')])->get();

        foreach ($products as $product) {
            $this->CreateOptions([
                'colors' => $this->Colors(),
                'sizes' => $this->Sizes()
            ], $product);
        }
    }

    private function CreateOptions($options, $product)
    {
        $optionsCollection = ProductOption::get();
        $optionValues = ProductOptionValue::get();

        $optionValueIds = [];

        foreach ($options as $option) {
            $optionModel = $optionsCollection->first(fn ($opt) => $option['name'] == $opt->translate('name'));

            if (!$optionModel) {
                $optionModel = ProductOption::create([
                    'name' => [
                        'en' => $option['name'],
                    ],
                ]);
            }

            foreach ($option['values'] as $value) {
                $valueModel = $optionValues->first(fn ($val) => $value == $val->translate('name'));

                if (!$valueModel) {
                    $valueModel = ProductOptionValue::create([
                        'product_option_id' => $optionModel->id,
                        'name'              => [
                            'en' => $value,
                        ],
                    ]);
                }

                $optionValueIds[] = $valueModel->id;
            }
        }

        GenerateVariants::dispatch($product, $optionValueIds);
    }

    private function Colors()
    {
        return [
            'name'   => 'LED Color',
            'values' => [
                'Red', 'Blue', 'Pink',
                'Yellow', 'Green', 'True White',
                'Cool White', 'Wireless RGB'
            ]
        ];
    }

    private function Sizes()
    {
        return [
            'name'   => 'LED Sign Size',
            'values' => [
                '5x5',
                '7x7'
            ]
        ];
    }
}
