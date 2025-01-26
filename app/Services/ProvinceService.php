<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProvinceService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/provinces';
    }

    public function getProvinces()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }
}