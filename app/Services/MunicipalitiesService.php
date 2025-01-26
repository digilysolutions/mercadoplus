<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MunicipalitiesService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/municipalities';
    }

    public function getMunicipalities()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }
}