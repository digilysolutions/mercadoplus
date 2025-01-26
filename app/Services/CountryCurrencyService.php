<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CountryCurrencyService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/countriescurrencies';
    }

    public function getCountryCurrency()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }


    public function createCountryCurrency($data)
    {
        $response = Http::post($this->baseUrl, $data);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function showCountryCurrency($id)
    {
        $response = Http::get($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function deleteCountryCurrency($id)
    {

        $response = Http::delete($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function updateCountryCurrency($id, $data)
    {
        $response = Http::put($this->baseUrl . '/' . $id, $data);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
}
