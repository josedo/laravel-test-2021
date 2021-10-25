<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\IShippingService;
use App\Services\FakeShippingService;

class ShippingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IShippingService::class, FakeShippingService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
