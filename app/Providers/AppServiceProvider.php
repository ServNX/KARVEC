<?php

namespace App\Providers;

use App\Modifiers\BaseShippingModifier;
use GetCandy\Base\ShippingModifiers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ShippingModifiers $shippingModifiers)
    {
        $shippingModifiers->add(
            BaseShippingModifier::class
        );
    }
}
