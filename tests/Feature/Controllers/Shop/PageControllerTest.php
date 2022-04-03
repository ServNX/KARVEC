<?php

namespace Tests\Feature\Controllers\Shop;

use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        // $this->artisan('getcandy:import:address-data');
        $this->seed(TestSeeder::class);
    }

    /** @test */
    public function can_render_the_shop_index_view()
    {
        $response = $this->get(route('shop.index'));

        $response->assertOk();

        $response->assertViewIs('shop.index');
    }

    /** @test */
    public function can_render_the_shop_popular_collections_view()
    {
        $response = $this->get(route('shop.popular'));

        $response->assertOk();

        $response->assertViewIs('shop.popular');
    }
}
