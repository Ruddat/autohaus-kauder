<?php

namespace App\Providers;

use App\Helpers\Settings;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
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
        // Nur im Web, nicht bei Migration
        if (!app()->runningInConsole()) {
            Settings::bootDefaults();
        }
    }
}
