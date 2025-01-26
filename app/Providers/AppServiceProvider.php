<?php

namespace App\Providers;

use App\Http\Controllers\BusinessController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        $business = Http::get('https://api.digilysolutions.com/api/businesses')->json(); // Ajusta esto a tu API.
      
        view()->share('business_name', $business['data'][0]['name']);
        view()->share('business_logo', $business['data'][0]['logo']);

       
    }
}
