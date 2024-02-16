<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function boot()
    {
        inertia::share('decks', function () {
            return auth()?->user()?->decks;
        });

        inertia::share('user', function () {
            return auth()?->user();
        });

        inertia::share('cards', function () {
            return auth()?->user()?->cards;
        });
    }
    public function register(): void
    {
        //
    }

}
