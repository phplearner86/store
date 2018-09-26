<?php

namespace App\Providers;

use App\Category;
use App\Color;
use App\Observers\CategoryObserver;
use App\Observers\ColorObserver;
use App\Observers\ProductObserver;
use App\Product;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Product::observe(ProductObserver::class);
        Category::observe(CategoryObserver::class);
        Color::observe(ColorObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
