<?php

namespace App\Providers;

use App\Jobs\ProductLiked;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        App::bindMethod(ProductLiked::class . '@handle', fn($job) => $job->handle());
    }
}
