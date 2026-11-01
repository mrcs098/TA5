<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        // Render terminates HTTPS before forwarding requests to the container.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
