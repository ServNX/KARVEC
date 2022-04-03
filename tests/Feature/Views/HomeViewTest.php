<?php

namespace Tests\Feature\Views;

use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HomeViewTest extends TestCase
{
    // use DatabaseMigrations;

    protected $view;

    public function setUp(): void
    {
        parent::setUp();

        // $this->artisan('getcandy:import:address-data');
        // $this->seed(TestSeeder::class);

        $this->view = $this->view('home', []);
    }

}
