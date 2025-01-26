<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TermService
{
    protected $baseUrl;
    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/terms';
    }

    public function getTerms()
    {
        $response = Http::get($this->baseUrl);
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }
    
   
    
    public function createTerm($data)
    {
        $response = Http::post($this->baseUrl, $data);

        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function showTerm($id)
    {
                $response = Http::get($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function attribute_terms($id)
    {
        $response =  Http::get($this->baseUrl . '/attribute/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }

    public function deleteTerm($id)
    {
        $response = Http::delete($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function updateTerm($id, $data)
    {
        $response = Http::put($this->baseUrl . '/' . $id, $data);      
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
}