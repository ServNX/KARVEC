<?php

namespace Database\Seeders\App;

use GetCandy\FieldTypes\TranslatedText;
use GetCandy\Models\Collection;
use GetCandy\Models\Currency;
use GetCandy\Models\Language;
use GetCandy\Models\Price;
use GetCandy\Models\Product;
use GetCandy\Models\ProductType;
use GetCandy\Models\ProductVariant;
use GetCandy\Models\TaxClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
           $this->CreateProducts();
        });
    }

    private function CreateProducts()
    {
        $productType = ProductType::whereName('LED Sign')->first();
        $taxClass = TaxClass::getDefault();
        $currency = Currency::getDefault();
        $language = Language::getDefault();

        $product = Product::create([
            'product_type_id' => $productType->id,
            'status'          => 'published',
            'brand'           => 'KARVEC',
            'attribute_data'  => [
                'name'        => new TranslatedText([
                    'en' => 'My Teddy LED Sign'
                ]),
                'description' => new TranslatedText([
                    'en' => 'Update Product Description'
                ]),
            ]
        ]);

        $product->urls()->create([
            'default' => true,
            'slug' => Str::slug($product->translateAttribute('name')),
            'language_id' => $language->id,
        ]);

        $productVariant = ProductVariant::create([
            'product_id'    => $product->id,
            'tax_class_id'  => $taxClass->id,
            'sku'           => Str::random(12),
            'unit_quantity' => 20,
            'shippable'     => true,
        ]);

        $collection = Collection::with(['group' => fn ($q) => $q->whereName('LED Signs')->first()])
            ->whereJsonContains('attribute_data->name->value->en', 'Children\'s Bedroom Signs')
            ->first();

        $collection->products()->sync([
            $product->id => [
                'position' => 1,
            ]
        ]);

        Price::create([
            'price'          => 3999,
            'currency_id'    => $currency->id,
            'priceable_type' => ProductVariant::class,
            'priceable_id'   => $productVariant->id,
        ]);

        $media = $product->addMedia(
            base_path("database/seeders/images/my-teddy-blue.jpg")
        )->preservingOriginal()->toMediaCollection('products');
        $media->setCustomProperty('primary', true);
        $media->save();
    }
}
