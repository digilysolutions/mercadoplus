<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CountryService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/countries';
    }

    public function getCountries()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }
}
