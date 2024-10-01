<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
			Config::set(["is_offline" => $this->getIsOffline()]);
    }
		
		// 30% valószínűséggel offline
		private function getIsOffline(): bool {
			return random_int(1, 10) > 5;
		}
}
