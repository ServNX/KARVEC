<?php

namespace Database\Seeders;

use Database\Seeders\App\CollectionsSeeder;
use Database\Seeders\App\LedSignSeeder;
use Database\Seeders\App\ProductsSeeder;
use Database\Seeders\App\ProductTypesSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            ProductTypesSeeder::class,
            CollectionsSeeder::class,
            ProductsSeeder::class,
            // LedSignSeeder::class
        ];

        foreach ($seeders as $seeder) {
            DB::transaction(function () use ($seeder) {
                $this->call($seeder);
            });
        }
    }
}
