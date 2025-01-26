<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NavbarController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function getMenuItemsCategories()
    {
        $menuCategories = $this->categoryService->getMenuCategories();
       
        $menuCategories  = $menuCategories["data"];
       
       return $menuCategories;
    }
}
