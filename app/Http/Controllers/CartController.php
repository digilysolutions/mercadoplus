<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\CountryCurrencyService;
use App\Services\DeliveryZonesService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $productsService;
    protected $cartService;
    protected $countryCurrencyService;
    protected $deliveryZones;
    public function __construct(DeliveryZonesService $deliveryZones, ProductService $productsService, CountryCurrencyService $countryCurrencyService, CartService $cartService)
    {
        $this->productsService = $productsService;
        $this->countryCurrencyService = $countryCurrencyService;
        $this->cartService = $cartService;
        $this->deliveryZones = $deliveryZones;
    }

    public function addProduct(Request $request)
    {
        // Valida los datos entrantes
        /* $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);*/
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $currency = Session::get('currency');
        $dataProduct = [
            'products_id' => [$request->product_id],
            'currency' => $currency
        ];
        $cart = Session::get('cart');

        // Verifica si el producto existe
        $product = $this->productsService->exchangeRateProduct($dataProduct)[0];

        // $product = $this->productsService->showProduct($request->product_id)['data']['product'];
        if ($product && $product['stock'] != null && $product['stock']['quantity_available'] < $request->quantity)
            return Session::get('cart');

        // Si el producto ya existe en el carrito
        if (isset($cart[$request->product_id])) {
            // Aumenta la cantidad
            $cart[$request->product_id]['quantity'] += $request->quantity;

        } else {
            // Si no existe, lo añade
            $cart[$request->product_id] = [
                'id' => $product['id'],
                'outstanding_image' =>  $product['outstanding_image'],
                'name' =>  $product['name'],
                'sale_price' => (!isset($product['discounted_price']) || $product['discounted_price'] === "" || $product['discounted_price'] === 0) ? $product['sale_price'] : $product['discounted_price'],
                'quantity' => $request->quantity
            ];
        }
        Session::put('cart', $cart);
        return Session::get('cart');
    }

    //Elimina la cantidad de productos del carrito de uno en uno y si esta en cero lo borra del carrito
    public function removeProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:0'
        ]);
        $cart = Session::get('cart');

        if (isset($cart[$request->product_id])) {
            if ($cart[$request->product_id]['quantity'] <= 1 || $request->quantity == 0) {
                unset($cart[$request->product_id]);
                Session::forget('cart');
            } else {
                $cart[$request->product_id]['quantity'] -= $request->quantity;
            }
        }
        Session::put('cart', $cart);
        return $this->showCart();
    }


    public function checkout(Request $request)
    {
        /* $person = Person::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );
        $order = $this->cartRepository->createOrder(session('temporary_id'), $person->id);
        $this->cartRepository->clearCart();

        return response()->json($order);*/
    }

    public function showCart()
    {
        $cart = Session::get('cart');
        // Para fines de depuración
        // return Session::get('cart');
        return response()->json($cart);
    }
    public function productExchangeRate()
    {
        return $this->cartService->productExchangeRate();
    }
    public function existProduct(Request $request)
    {
        $cart = Session::get('cart');
        if (isset($cart[$request->id]['id'])) {
            return [
                'exists' => true,
                'quantity' => $cart[$request->id]['quantity']
            ];
        }
        return [
            'exists' => false,
            'quantity' => 0
        ];
    }
    public function showInfoCart()
    {
        $info = $this->infoCart();
        $currency =  $info['currency'];
        $deliveryZones =  $info['deliveryZones'];
        $products =  $info['products'];
        $countryCurrencies =  $info['countryCurrencies'];


        return view('app.cart', compact('currency', 'countryCurrencies', 'products', 'deliveryZones'));
    }
    public function infoCart()
    {
        $products = Session::get('cart', []);
        /*if (empty($products) || count($products)==0) {
            return redirect('/');
        }*/

        $deliveryZones = $this->deliveryZones->getDeliveryZones();
        $deliveryZones = $deliveryZones['data'];

        $currency = Session::get('currency');


        $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
        $countryCurrencies = $countryCurrencies['data'];
        return [
            'deliveryZones' => $deliveryZones,
            'currency' => $currency,
            'products' => $products,
            'countryCurrencies' => $countryCurrencies
        ];
    }
}
