<?php

namespace App\Providers;

use App\Http\Controllers\NavbarController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class ViewServiceProvider extends ServiceProvider
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
        View::composer('layouts.partials-frontend.navbar', function ($view) {
            $categoryController = app(NavbarController::class);
            $menuCategories = $categoryController->getMenuItemsCategories();
            $specialOfferProduct = $categoryController->specialOffer();
            // Comparte las categorías con la vista
            $view->with('menuCategories', $menuCategories)
             ->with('specialOfferProduct', $specialOfferProduct);
        });
         // Puedes agregar más vistas aquí si lo necesitas
         View::composer('index', function ($view) {
            $categoryController = app(NavbarController::class);
            $menuCategories = $categoryController->getMenuItemsCategories();
            $specialOfferProduct = $categoryController->specialOffer();
            $view->with('menuCategories', $menuCategories)
            ->with('specialOfferProduct', $specialOfferProduct);
        });
    }
}
