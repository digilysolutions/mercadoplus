<?php

namespace App\Providers;

use App\Http\Controllers\NavbarController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
     
        View::composer('layouts.partials-frontend.navbar', function ($view) {
            $categoryController = app(NavbarController::class);
            $menuCategories = $categoryController->getMenuItemsCategories();  
            // Comparte las categorías con la vista
            $view->with('menuCategories', $menuCategories);           
        });
         // Puedes agregar más vistas aquí si lo necesitas
         View::composer('index', function ($view) { 
            $categoryController = app(NavbarController::class);
            $menuCategories = $categoryController->getMenuItemsCategories();                 
            $view->with('menuCategories', $menuCategories);
        });
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
}
