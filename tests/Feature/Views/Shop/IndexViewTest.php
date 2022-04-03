<?php

namespace Tests\Feature\Views\Shop;

use Database\Seeders\TestSeeder;
use GetCandy\Models\CollectionGroup;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class IndexViewTest extends TestCase
{
    use DatabaseMigrations;

    protected $view;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('getcandy:import:address-data');
        $this->seed(TestSeeder::class);

        $this->view = $this->view('shop.index', [
            'collections' => CollectionGroup::whereHandle('main')->first()->collections
        ]);
    }

    /** @test */
    public function shop_index_has_featured_products()
    {
        $this->view->assertSee('featured-products');
    }

    /** @test */
    public function shop_index_featured_products_has_section_title()
    {
        $this->view->assertSee('section-title');
        $this->view->assertSeeTextInOrder([
            'Test Collection 1',
            'Test Collection Description 1'
        ]);
    }

    /** @test */
    public function shop_index_has_collections_with_products_in_correct_order()
    {
        $this->view->assertSeeInOrder([
            'Test Collection 1',
            'Test Product 1',
            'Test Collection 2',
            'Test Product 2',
            'Test Collection 3',
            'Test Product 3'
        ]);
    }
}
