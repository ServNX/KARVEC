<?php

namespace Tests;

use Faker\Generator;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var Generator
     */
    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = $this->app->make(Generator::class);
    }
}
