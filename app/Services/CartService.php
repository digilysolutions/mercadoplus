<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CartService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.digilysolutions.com/api/products';
    }

    public function exchangeRates($data)
    {
        $response = Http::post($this->baseUrl.'/'.'exchangeRates', $data);

        if ($response->successful()) {
            return $response->json();
        }
        return null; // O manejar los errores según sea necesario
    }

    public function productExchangeRate()
    {
        $cart  = Session::get('cart');  
     
        if (!empty($cart)) {
            $currency = Session::get('currency');
            $productIds = array_keys($cart);
           
            $data = [
                'products_id' => $productIds,
                'currency' => $currency // Puedes ajustar esto según lo necesites;
            ];          
            $products =   $this->exchangeRates($data);                      
            foreach ($products as $product) {
             
                // Si no existe, lo añade
                $cart[$product['id']] = [
                    'id' => $product['id'],
                    'outstanding_image' =>  $product['outstanding_image'],
                    'name' =>  $product['name'],
                    'sale_price' => (!isset($product['discounted_price']) || $product['discounted_price'] === "" || $product['discounted_price'] === 0) ? $product['sale_price'] : $product['discounted_price'],
                   'quantity'=>  $cart[$product['id']]['quantity']
                  
                ];
                
                   }
            Session::put('cart', $cart);            
            $cart = Session::get('cart');                 
            return Session::get('cart');   
        }
        else
        {         
            return $cart;
        }
    }
}
