<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BusinessService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/businesses';
    }

    public function getBusiness()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }

    public function createBusiness($data)
    {
        $response = Http::post($this->baseUrl, $data);

        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function showBusiness($id)
    {
        $response = Http::get($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }

    public function deleteBusiness($id)
    {
        $response = Http::delete($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function updateBusiness($id, $data)
    {
        $response = Http::put($this->baseUrl . '/' . $id, $data);      
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
}