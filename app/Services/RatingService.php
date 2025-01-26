<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RatingService
{
    protected $baseUrl;
    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/ratings';
    }

    public function getRatings()
    {
        $response = Http::get($this->baseUrl);
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }
    
    public function createRating($data)
    {
        $response = Http::post($this->baseUrl, $data);

        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function showRating($id)
    {
                $response = Http::get($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }

    public function deleteRating($id)
    {
        $response = Http::delete($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function updateRating($id, $data)
    {
        $response = Http::put($this->baseUrl . '/' . $id, $data);      
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
}