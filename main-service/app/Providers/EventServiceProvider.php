<?php

namespace App\Providers;

use App\Jobs\ProductCreated;
use App\Jobs\ProductDeleted;
use App\Jobs\ProductUpdated;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

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
        App::bindMethod(ProductUpdated::class . '@handle', fn($job) => $job->handle());
        App::bindMethod(ProductCreated::class . '@handle', fn($job) => $job->handle());
        App::bindMethod(ProductDeleted::class . '@handle', fn($job) => $job->handle());
    }
}
