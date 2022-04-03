<?php

namespace Database\Seeders\App;

use GetCandy\Models\State;
use GetCandy\Models\TaxClass;
use GetCandy\Models\TaxZone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxSeeder extends Seeder
{
    public function run()
    {
        DB::transaction(function () {
            $taxZone = TaxZone::create([
                'name' => 'Ohio',
                'zone_type' => 'state',
                'price_display' => 'tax_inclusive',
                'active' => true,
                'default' => true,
            ]);

            $state = State::whereName('Ohio')->first();

            $taxZone->states()->create([
                'state_id' => $state->id,
            ]);

            $taxRate = $taxZone->taxRates()->create([
                'name' => 'Ohio'
            ]);

            $taxRate->taxRateAmounts()->create([
                'tax_class_id' => TaxClass::getDefault()->id,
                'percentage' => 7.5
            ]);
        });
    }
}
