<?php

namespace App\Providers;

use App\Services\Impl\PrayerServiceImpl;
use App\Services\PrayerService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PrayerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function provides(){
        return [
            PrayerService::class
    ];
    }

    public array $singletons = [
          PrayerService::class => PrayerServiceImpl::class
    ];
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
        //
    }
}
