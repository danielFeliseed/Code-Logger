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
            return auth()->user()->decks;
        });
    }
    public function register(): void
    {
        //
    }

}
