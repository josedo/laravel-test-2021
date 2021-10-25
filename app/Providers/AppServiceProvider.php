<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

use App\Interfaces\IProcessMessage;
use App\Actions\ProcessMessage;
// use Illuminate\Auth\Access\AuthorizationException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IProcessMessage::class, ProcessMessage::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
