<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ContactService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/contacts';
    }

    public function getContact()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }
    public function createContact($data)
    {
        $response = Http::post($this->baseUrl, $data);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function showContact($id)
    {
        $response = Http::get($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function deleteContact($id)
    {

        $response = Http::delete($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function updateContact($id, $data)
    {
        $response = Http::put($this->baseUrl . '/' . $id, $data);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
}
