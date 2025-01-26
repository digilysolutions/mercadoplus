<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UnitBaseService 
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/unitsbase';
    }

    public function getUnitsBase()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }

    public function createUnitBase($data)
    {
        $response = Http::post($this->baseUrl, $data);

        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function showUnitBase($id)
    {
        $response = Http::get($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }

    public function deleteUnitBase($id)
    {

        $response = Http::delete($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function updateUnitBase($id, $data)
    {
        $response = Http::put($this->baseUrl . '/' . $id, $data);      
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
}