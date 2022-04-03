<?php

namespace Database\Seeders;

use GetCandy\FieldTypes\Text;
use GetCandy\FieldTypes\TranslatedText;
use GetCandy\Hub\Models\Staff;
use GetCandy\Models\Attribute;
use GetCandy\Models\AttributeGroup;
use GetCandy\Models\Channel;
use GetCandy\Models\Collection;
use GetCandy\Models\CollectionGroup;
use GetCandy\Models\Currency;
use GetCandy\Models\CustomerGroup;
use GetCandy\Models\Language;
use GetCandy\Models\Price;
use GetCandy\Models\Product;
use GetCandy\Models\ProductType;
use GetCandy\Models\ProductVariant;
use GetCandy\Models\TaxClass;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class TestSeeder extends Seeder
{

    public function run()
    {

        $channel = Channel::create([
            'name' => 'Webstore',
            'handle' => 'webstore',
            'default' => true,
            'url' => 'localhost',
        ]);

        $staff = Staff::create([
            'firstname' => 'Mike',
            'lastname' => 'Wiley',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'admin' => true,
        ]);

        $language = Language::create([
            'code' => 'en',
            'name' => 'English',
            'default' => true,
        ]);

        $currency = Currency::create([
            'code' => 'USD',
            'name' => 'US Dollar',
            'exchange_rate' => 1,
            'format' => '${value}',
            'decimal_point' => '.',
            'thousand_point' => ',',
            'decimal_places' => 2,
            'default' => true,
            'enabled' => true,
        ]);

        $customerGroup = CustomerGroup::create([
            'name' => 'Retail',
            'handle' => 'retail',
            'default' => true,
        ]);

        $collectionGroup = CollectionGroup::create([
            'name' => 'Main',
            'handle' => 'main',
        ]);

        $taxClass = TaxClass::create([
            'name' => 'Default Tax Class',
            'default' => true,
        ]);

        AttributeGroup::create([
            'attributable_type' => Product::class,
            'name' => collect([
                'en' => 'Details',
            ]),
            'handle' => 'details',
            'position' => 1,
        ]);

        AttributeGroup::create([
            'attributable_type' => Collection::class,
            'name' => collect([
                'en' => 'Details',
            ]),
            'handle' => 'collection_details',
            'position' => 1,
        ]);

        Attribute::create([
            'attribute_type' => Product::class,
            'attribute_group_id' => $collectionGroup->id,
            'position' => 1,
            'name' => [
                'en' => 'Name',
            ],
            'handle' => 'name',
            'section' => 'main',
            'type' => TranslatedText::class,
            'required' => true,
            'default_value' => null,
            'configuration' => [
                'type' => 'text',
            ],
            'system' => true,
        ]);

        Attribute::create([
            'attribute_type' => Collection::class,
            'attribute_group_id' => $collectionGroup->id,
            'position' => 1,
            'name' => [
                'en' => 'Name',
            ],
            'handle' => 'name',
            'section' => 'main',
            'type' => TranslatedText::class,
            'required' => true,
            'default_value' => null,
            'configuration' => [
                'type' => 'text',
            ],
            'system' => true,
        ]);

        Attribute::create([
            'attribute_type' => Product::class,
            'attribute_group_id' => $collectionGroup->id,
            'position' => 2,
            'name' => [
                'en' => 'Description',
            ],
            'handle' => 'description',
            'section' => 'main',
            'type' => TranslatedText::class,
            'required' => true,
            'default_value' => null,
            'configuration' => [
                'type' => 'richtext',
            ],
            'system' => true,
        ]);

        Attribute::create([
            'attribute_type' => Collection::class,
            'attribute_group_id' => $collectionGroup->id,
            'position' => 2,
            'name' => [
                'en' => 'Description',
            ],
            'handle' => 'description',
            'section' => 'main',
            'type' => TranslatedText::class,
            'required' => true,
            'default_value' => null,
            'configuration' => [
                'type' => 'richtext',
            ],
            'system' => true,
        ]);

        $productType = ProductType::create([
            'name' => 'Stock',
        ]);

        $productType->mappedAttributes()->attach(
            Attribute::whereAttributeType(Product::class)->get()->pluck('id')
        );

        for ($x = 1; $x <= 3; $x++) {
            $product = Product::create([
                'product_type_id' => $productType->id,
                'status'          => 'draft',
                'brand'           => 'KARVEC',
                'attribute_data'  => [
                    'name'        => new TranslatedText(collect([
                        'en' => new Text("Test Product $x")
                    ])),
                    'description' => new TranslatedText(collect([
                        'en' => new Text("Test Product Description $x")
                    ])),
                ]
            ]);

            $productVariant = ProductVariant::create([
                'product_id'   => $product->id,
                'tax_class_id' => $taxClass->id,
                'sku'           => Str::random(12),
                'unit_quantity' => 1,
                'shippable'     => true,
            ]);


            $collection = Collection::create([
                'attribute_data' => [
                    'name' => new TranslatedText(collect([
                        'en' => new Text("Test Collection $x")
                    ])),
                    'description' => new TranslatedText(collect([
                        'en' => new Text("Test Collection Description $x")
                    ])),
                ],
                'collection_group_id' => $collectionGroup->id,
            ]);

            $collection->products()->sync([
                $product->id => [
                    'position' => 1,
                ]
            ]);

            Price::create([
                'price'         => 1999,
                'compare_price' => 2500,
                'currency_id'   => $currency->id,
                'priceable_type' => ProductVariant::class,
                'priceable_id' => $productVariant->id,
            ]);

            $file = UploadedFile::fake()->image('test.jpg');

            $product->addMedia($file)->toMediaCollection();
        }
    }
}
