<?php

namespace Database\Seeders\App;

use GetCandy\FieldTypes\Text;
use GetCandy\FieldTypes\TranslatedText;
use GetCandy\Models\Collection;
use GetCandy\Models\CollectionGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CollectionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->CreateCollections();
    }

    private function collections()
    {
        return [
            'LED Signs'       => [
                'Children\'s Bedroom Signs',
                'Team Inspired Signs',
                'Teen Bedroom & Gaming Signs',
                'Office Signs'
            ],
            'Wooden Signs'    => [
                'Children\'s Bedroom Signs',
                'Team Inspired Signs',
                'Teen Bedroom & Gaming Signs',
                'Office Signs',
                'Kitchen Signs',
                'Family Signs',
                'Bathroom Signs',
                'Laundry Signs',
            ],
            'Wooden Coasters' => [
                'Team Inspired Coasters',
                'Monogram Coasters',
                'Plain Coasters',
                'State Coasters',
                'Family Coasters',
                'Mature & Funny Coasters'
            ],
            'Wooden Trays'    => [
                'Team Inspired Trays',
                'Monogram Trays',
                'Plain Trays',
                'State Trays',
                'Family Trays',
                'Mature & Funny Trays',
                'Serving Trays',
                'Cheese & Cracker Trays'
            ]
        ];
    }

    private function CreateCollections()
    {
        $collections = $this->collections();

        foreach ($collections as $group => $collection) {
            $collectionGroup = CollectionGroup::create([
                'name'   => $group,
                'handle' => Str::slug($group),
            ]);

            foreach ($collection as $value) {
                Collection::create([
                    'attribute_data'      => [
                        'name'        => new TranslatedText([
                            'en' => new Text($value)
                        ]),
                        'description' => new TranslatedText([
                            'en' => new Text('Update Collection Description')
                        ]),
                    ],
                    'collection_group_id' => $collectionGroup->id,
                ]);
            }
        }
    }
}
