<?php

namespace App\Providers;

use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\CookieRepository;
use App\Repositories\Cart\DatabaseRepository;
use App\Repositories\Cart\SessionRepository;
use Illuminate\Support\ServiceProvider;

class CardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        #Method 1
        $this->app->singleton(CartRepository::class, function ($app) {
            if (config('cart.driver') == 'cookie') {
                return new CookieRepository();
            }

            if (config('cart.driver') == 'session') {
                return new SessionRepository();
            }

            return new DatabaseRepository();
        });

        #Method 2 
        /* $repo=new CookieRepository();
        $this->app->instance(CartRepository::class , $repo);*/
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
