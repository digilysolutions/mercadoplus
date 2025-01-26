<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CategoryService
{
    protected $baseUrl;
    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/productcategories';
        

    }

    public function getCategories()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }

    public function createCategory($data)
    {
        $response = Http::post($this->baseUrl, $data);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function storeCategoryName($data)
        {
        $response = Http::post($this->baseUrl.'/'.'storeCategoryName/productcategories', $data);

        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function showCategory($id)
    {
        $response = Http::get($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }

    public function deleteCategory($id)
    {

        $response = Http::delete($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function updateCategory($id, $data)
    {
        $response = Http::put($this->baseUrl . '/' . $id, $data);      
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }

    public function getMenuCategories()
    {
        $response = Http::get($this->baseUrl. '/' . 'menu/categories');
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }
}
