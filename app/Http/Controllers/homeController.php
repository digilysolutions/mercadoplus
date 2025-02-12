<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\ContactService;
use App\Services\CountryCurrencyService;
use App\Services\DeliveryZonesService;
use App\Services\PersonService;
use App\Services\ProductService;
use App\Services\ReviewService;
use Carbon\Carbon;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class homeController extends Controller
{
    protected $productsService;
    protected $cartService;
    protected $contactService;
    protected $personService;
    protected $reviewService;
    protected $countryCurrencyService;
    protected $deliveryZones;
    public function __construct(ReviewService $reviewService, DeliveryZonesService $deliveryZones, ContactService $contactService, PersonService  $personService, CartService  $cartService, CountryCurrencyService $countryCurrencyService, ProductService $productsService)
    {
        $this->cartService = $cartService;
        $this->reviewService = $reviewService;
        $this->contactService = $contactService;
        $this->productsService = $productsService;
        $this->personService = $personService;
        $this->deliveryZones = $deliveryZones;
        $this->countryCurrencyService = $countryCurrencyService;
        if (!Session::has('currency')) {
            Session::put('currency', 'MN'); // Establece un valor predeterminado
        }
    }
    public function index()
    {
        $currency = $this->getCurrency();
        $products = $this->productsService->getProducts();
        $products = $products['data'];
        $randomProducts = $products;
        $latestProducts = collect($products);
        $latestProducts = $latestProducts->sortByDesc('created_at')->take(8);
        shuffle($randomProducts);
        $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
        $countryCurrencies = $countryCurrencies['data'];

        return view('index', compact('latestProducts', 'randomProducts', 'countryCurrencies', 'currency'));
    }

    public function productsExchangeRates($currency)
    {
        Log::info($currency);

        $products = $this->productsService->productsExchangeRates($currency);
        $products = $products['data'];

        $randomProducts = $products;
        $latestProducts = collect($products);
        $latestProducts = $latestProducts->sortByDesc('created_at')->take(8);
        shuffle($randomProducts);

        $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
        $countryCurrencies = $countryCurrencies['data'];
        $this->updateCurrency($currency);
        $currency =     $this->getCurrency();
        $cart =  $this->cartService->productExchangeRate();

        return  ['cart' => $cart, 'latestProducts' => $latestProducts];
    }


    public function detailsProduct($idProduct)
    {
        $currency = Session::get('currency');
        $dataProduct = [
            'products_id' => [$idProduct],
            'currency' => $currency
        ];
        $product = $this->productsService->exchangeRateProduct($dataProduct)[0];

       /* $data = $this->productsService->showProduct($idProduct);
        $product = $data['data']['product'];
        $averageRating = $data['data']['averageRating'];
        $attributeTerms = $data['data']['attributeTerms'];
        $currentPrice = $data['data']['currentPrice'];*/

        $averageRating = $product['averageRating'];
       // $attributeTerms =$product['attributeTerms'];
       // $currentPrice = $product['currentPrice'];


        $currency = $this->getCurrency();
        $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
        $countryCurrencies = $countryCurrencies['data'];
        $comments = $product['reviews'];
        $ratings = $product['rating'];

        $termsArray = $product['terms'];
        $product_attribute_terms = [];
        foreach ($termsArray as $term) {
            $attribute_name = $term['attribute']['name'];
            if (!isset($product_attribute_terms['attribute'][$attribute_name])) {
                $product_attribute_terms['attribute'][$attribute_name] = [];
            }
            $product_attribute_terms['attribute'][$attribute_name][] = $term['name'];
        }
        //$cart =  Session::get('cart');


        return view('app.detailsproduct', compact('currency', 'ratings', 'product', 'countryCurrencies', 'product_attribute_terms', 'comments'));
    }
    public function getCurrency()
    {
        return Session::get('currency');
    }
    public function updateCurrency($currency)
    {
        Session::put('currency', $currency);
    }
    public function storeReview(Request $request)
    {
        $dataPerson = $request->only([
            'first_name',
            'phone'
        ]);
        $dataComment = $request->only([
            'product_id',
            'comment'
        ]);

        //Comprobar si el cliente existe, comprobando su phone y nombre
        //  $person  = $this->personService->findPersonByAttribute($dataPerson);

        // if (empty($person)) {

        $person = $this->personService->createPerson($dataPerson);

        // }
        $dataComment['writer_id'] = $person['data']['id'];
        $dataComment['is_activated'] = true;
        $comment = $this->reviewService->createReview($dataComment);

        return $comment;
    }
    public function checkout($idDomicilio)
    {
        $cart = Session::get('cart');

        if (empty($cart) || count($cart)==0) {
            return redirect('/');
        }
        if (is_array($cart)) {
            $deliveryZone = null;
            if ($idDomicilio != 0)
                $deliveryZone = $this->deliveryZones->showDeliveryZone($idDomicilio)['data'];

            $deliveryZones = $this->deliveryZones->getDeliveryZones();
            $deliveryZones = $deliveryZones['data'];


            $currency = $this->getCurrency();
            $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
            $countryCurrencies = $countryCurrencies['data'];
            return view('app.checkout', compact('deliveryZone', 'deliveryZones', 'cart', 'currency', 'countryCurrencies'));
        }
        return $this->index();
    }

    public function orderPurchase(Request $request)
    {
        $cart = Session::get('cart');
        if (is_array($cart)) {
            $subtotal_amount = 0;
            $total_amount = 0;
            $delivery_fee = 0;
            $deliveryZone = null;
            $data = [
                'home_delivery' => $request->is_delivery,
                'address' => $request->address,
                'deliveryzona_id' => $request->deliveryzona_id,

            ];

            //Obtener de name y el phone la persona que realiza la oden  de la BD a ver si existe, de no existir la mando a crear y guardo el id de la persona para enviarla
            $detailsPerson = [
                'first_name' => $request->name,
                'phone' => $request->phone,
            ];
            $person =  $this->personService->createPerson($detailsPerson);
            $purchasePerson = $person;

            $phone = $request->input('phone_other_person');
            $name = $request->input('name_other_person');
            if (!empty($phone) && empty($name)) {
                $detailsPerson = [
                    'first_name' => $name,
                    'phone' => $phone,
                ];
                $purchasePerson = $this->personService->createPerson($detailsPerson);
            }
            $phone = $request->input('phone_receives_purchase');
            $name = $request->input('name_receives_purchase');
            if (!empty($phone) && empty($name)) {
                $detailsPerson = [
                    'first_name' => $name,
                    'phone' => $phone,
                ];
                $deliveryPerson = $this->personService->createPerson($detailsPerson);
                $data['delivery_person_id'] = $deliveryPerson['data']['id'];
            }
            $data['home_delivery'] = isset($data['home_delivery']) && $data['home_delivery'] == 'on' ? 1 : 0;
            if ($data['home_delivery']) {
                $deliveryZone = $this->deliveryZones->showDeliveryZone($data['deliveryzona_id'])['data'];
                $delivery_fee = $deliveryZone['price'];
                $delivery_time = $deliveryZone['delivery_time'];
                $time_unit = $deliveryZone['time_unit'];
            }


            $purchase_date = Carbon::now()->format('d/m/Y');

            $currency = Session::get('currency');


            // Asegúrate de que $cart sea un array


            foreach ($cart as $product) {
                $subtotal_amount += $product['sale_price'] * $product['quantity'];
            }

            $total_amount = $subtotal_amount + $delivery_fee;

            $data['status_id'] = 1;
            $data['time_unit'] =  $time_unit ?? 0;
            $data['delivery_time'] = $delivery_time ?? "";
            $data['purchase_date'] = $purchase_date;
            $data['currency'] = $currency;
            $data['subtotal_amount'] = $subtotal_amount;
            $data['total_amount'] = $total_amount;
            $data['delivery_fee'] = $delivery_fee;
            $data['person_id'] = $person['data']['id'];
            $data['purchase_person_id'] = $purchasePerson['data']['id'];
            return $data;
        }
        return $this->index();
    }
}
