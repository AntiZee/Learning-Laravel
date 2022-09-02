<?php

namespace App\Providers;

use App\Services\todolistService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class todolistServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        todolistService::class => todolistServiceImplementation::class
    ];
    public function provides(): array
    {
        return [todolistService::class];
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