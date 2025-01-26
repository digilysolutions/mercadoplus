<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TagService
{
    protected $baseUrl;
    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/tags';
    }

    public function getTags()
    {
        $response = Http::get($this->baseUrl);
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }
    
    public function createTag($data)
    {
        $response = Http::post($this->baseUrl, $data);

        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function showTag($id)
    {
                $response = Http::get($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }

    public function deleteTag($id)
    {
        $response = Http::delete($this->baseUrl . '/' . $id);
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
    public function updateTag($id, $data)
    {
        $response = Http::put($this->baseUrl . '/' . $id, $data);      
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }

    public function searchTags($query)
    {
      
        $response = Http::get('https://api.digilysolutions.com/api/searchTags/tags',$query);    
    
        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario

    }
}