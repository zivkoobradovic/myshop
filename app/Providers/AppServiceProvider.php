<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);


        View::composer(['products.create', 'products.edit'], function ($view) {
            $view->with('categories', Category::all());
        });
        View::composer(['partials.sidebar'], function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
