<?php

namespace App\Providers;

use App\Models\Store;
use Illuminate\Support\Facades\View;
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
    public function boot()
    {
        View::composer(['products.create', 'products.edit'], function ($view) {
            $view->with('stores', Store::all());
        });
    }
}
