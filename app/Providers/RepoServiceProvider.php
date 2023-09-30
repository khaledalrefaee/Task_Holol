<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\CategoriesRepositoryInterface',
            'App\Repository\CategoriesRepository');
        $this->app->bind(
            'App\Repository\ProductRepositoryInterface',
            'App\Repository\ProductRepository');


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
