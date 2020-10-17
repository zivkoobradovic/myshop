<?php

namespace App\Providers;

use App\Models\ActiveStore;
use Illuminate\Support\ServiceProvider;

class ActiveStoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {   
        $this->app->bind('active_store', function () {
            return ActiveStore::getStore();
        });
    }
}
