<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\CategoryService;
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
use Illuminate\Support\Facades\URL;

class homeController extends Controller
{
    protected $productsService;
    protected $cartService;
    protected $contactService;
    protected $personService;
    protected $reviewService;
    protected $countryCurrencyService;
    protected $deliveryZones;
    protected $filterProducts;
    protected $categoryService;
    public function __construct(ReviewService $reviewService, CategoryService $categoryService, DeliveryZonesService $deliveryZones, ContactService $contactService, PersonService  $personService, CartService  $cartService, CountryCurrencyService $countryCurrencyService, ProductService $productsService)
    {
        $this->cartService = $cartService;
        $this->reviewService = $reviewService;
        $this->contactService = $contactService;
        $this->productsService = $productsService;
        $this->personService = $personService;
        $this->categoryService = $categoryService;
        $this->deliveryZones = $deliveryZones;
        $this->countryCurrencyService = $countryCurrencyService;
        if (!Session::has('currency')) {
            Session::put('currency', 'MN'); // Establece un valor predeterminado
        }
        $this->filterProducts = collect();
    }
    public function index()
    {
        $currency = $this->getCurrency();
        $products = $this->productsService->getProducts();

        $products = $products['data'];
        $randomProducts = $products;
        $latestProducts = collect($products);
        $latestProducts = $latestProducts->sortByDesc('created_at')->take(9);

        $featuredProducts = collect($products);
        $featuredProducts = $featuredProducts->sortByDesc('views')->take(9);
        shuffle($randomProducts);
        $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
        $countryCurrencies = $countryCurrencies['data'];

        return view('index', compact('latestProducts', 'randomProducts', 'countryCurrencies', 'currency', 'featuredProducts'));
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
        $products = $this->productsService->getProducts();
        $products = $products['data'];
        $randomProducts = $products;
        shuffle($randomProducts);

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


        return view('app.detailsproduct', compact('currency', 'ratings', 'randomProducts', 'product', 'countryCurrencies', 'product_attribute_terms', 'comments'));
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

        if (empty($cart) || count($cart) == 0) {
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
            $delivery_name = null;
            $delivery_fee = 0;
            $delivery_time = null;
            $time_unit = null;
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
            $detailsPersonBuyer = [
                'first_name' => $request->name,
                'phone' => $request->phone,
            ];
            $person =  $this->personService->createPerson($detailsPersonBuyer);
            $purchasePerson = $person;

            $detailsPersonPurchase = [
                'first_name' => $request->name_other_person,
                'phone' => $request->phone_other_person,
            ];
            if (!empty($request->phone_other_person) && !empty($request->name_other_person)) {

                $purchasePerson = $this->personService->createPerson($detailsPersonPurchase);
            }

            $phone = $request->input('phone_receives_purchase');
            $name = $request->input('name_receives_purchase');

            if (!empty($phone) && !empty($name)) {
                $detailsPersonDelivery = [
                    'first_name' => $name,
                    'phone' => $phone,
                ];
                $deliveryPerson = $this->personService->createPerson($detailsPersonDelivery);
                $data['delivery_person_id'] = $deliveryPerson['data']['id'];
            }
            $data['home_delivery'] = isset($data['home_delivery']) && $data['home_delivery'] == 'on' ? 1 : 0;
            if ($data['home_delivery']) {
                $deliveryZone = $this->deliveryZones->showDeliveryZone($data['deliveryzona_id'])['data'];
                $delivery_name = $deliveryZone['location']['name'];
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
            return $this->sendWhatsapp(
                $detailsPersonBuyer,
                $detailsPersonPurchase,
                $detailsPersonDelivery,
                $cart,
                $data['home_delivery'],
                $delivery_name,
                $delivery_fee,
                $delivery_time,
                $time_unit,
                $subtotal_amount,
                $total_amount
            );
        }
        return "No paso";
        return $this->index();
    }
    public function   sendWhatsapp(
        $detailsPersonBuyer,
        $detailsPersonPurchase,
        $detailsPersonDelivery,
        $products,
        $home_delivery,
        $delivery_name,
        $delivery_fee,
        $delivery_time,
        $time_unit,
        $subtotal_amount,
        $total_amount
    ) {
        $whatsapp = 5358205054;
        if ($home_delivery) {
            $delivery = "
             Domicilio: Si
             Zona: {$delivery_name}
             Tiempo de entrega: {$delivery_time} {$time_unit}
            ";
        }


        $message = "🛒 *Orden de Compra*\n"; // Icono de carrito y título
        $message .= "Número de Orden: *m525pl7w33*\n\n"; // Número de orden, importante para seguimiento
        $message .= "📝 *Detalle del Pedido*:\n"; // Detalle del pedido
        $message .= "Cantidad | Producto | Precio\n"; // Encabezado de la tabla
        $message .= "-----------------------------------\n"; // Carácter de separación para la tabla

        foreach ($products as $product) {
            $message .= sprintf("%8s | %-30s | $%s\n",
                $product['quantity'], // Cantidad
                substr($product['name'], 0, 30), // Nombre del producto (truncate si es muy largo)
                number_format($product['sale_price'], 2) // Precio con dos decimales
            );
        }

        $message .= "\n" . "💰 *Resumen de la Orden*:\n"; // Resumen de la orden
        $message .= "*Subtotal*: $" . number_format($subtotal_amount, 2) . "\n"; // Subtotal
        $message .= "*Descuento*: -$" . number_format(0, 2) . "\n"; // Descuento
        $message .= "*Domicilio*: $" . number_format($delivery_fee, 2) . "\n"; // Domicilio
        $message .= "*Total*: $" . number_format($total_amount, 2) . "\n\n"; // Total y salto de línea

        $message .= "📦 *Información del Pedido*:\n"; // Información del pedido
        $message .= "*Creador de la Ordende la compra*: " . $detailsPersonBuyer['first_name'] . "\n"; // Nombre del comprador
        $message .= "*NOmbre del comprador*: " . $detailsPersonPurchase['first_name'] . "\n"; // Nombre del comprador
        $message .= "*Nombre del Receptor*: " . $detailsPersonDelivery['first_name'] . "\n\n"; // Nombre del receptor

        $message .= "\nNúmero de WhatsApp: " . $whatsapp . "\n"; // Agrega el número de WhatsApp


        $url = "https://wa.me/{$whatsapp}?text=" . urlencode($message);
        Session::forget('cart');
        // Redirigir al enlace de WhatsApp
        return redirect($url);
    }
    public function customerservice()
    {
        $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
        $countryCurrencies = $countryCurrencies['data'];
        $currency = $this->getCurrency();
        return view('app.customerservice', compact('countryCurrencies', 'currency'));
    }
    public function contact()
    {
        $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
        $countryCurrencies = $countryCurrencies['data'];
        $currency = $this->getCurrency();
        return view('app.contact', compact('countryCurrencies', 'currency'));
    }
    public function specialOffer()
    {
        $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
        $countryCurrencies = $countryCurrencies['data'];
        $products = $this->productsService->getProducts();
        $products = $products['data'];
        $specialOfferProducts = collect($products);

        // Filtrar los productos
        $specialOfferProducts = $specialOfferProducts->filter(function ($product) {
            return $product['discounted_price'] > 0 && $product['discounted_price'] < $product['sale_price'];
        });
        $currency = $this->getCurrency();
        return view('app.specialoffer', compact('countryCurrencies', 'currency', 'specialOfferProducts'));
    }
    public function sendMessageContact(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:15',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2500',
        ]);

        // Obtener los datos
        $name = $request->input('name');
        $whatsapp = $request->input('whatsapp');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Número del WhatsApp de la empresa (asegúrate de que este sea el formato correcto)
        $whatsappNumber = '5353947137';

        // Formato del mensaje con emojis y saltos de línea
        $whatsappMessage = "*Nombre:* " . urlencode($name) . "%0A" .
            "*Número de WhatsApp:* " . urlencode($whatsapp) . "%0A" .
            ($subject ? "*Asunto:* " . urlencode($subject) . "%0A" : '') .
            "*Mensaje:* " . urlencode($message) . "%0A%0A" .
            "¡Gracias por ponerte en contacto con nosotros! 😊%0A" .
            "Este mensaje fue enviado desde la sección de contacto.%0A" .
            "Visita nuestro sitio: (http://mercadoplus.digilysolutions.com)%0A" .
            "¡Esperamos tu mensaje!";

        // Crear la URL de WhatsApp
        $whatsappUrl = "https://wa.me/$whatsappNumber?text=" . $whatsappMessage;
        return  $whatsappUrl;
    }
    public function shop(Request $request)
    {
        $countryCurrencies = $this->countryCurrencyService->getCountryCurrency();
        $countryCurrencies = $countryCurrencies['data'];
        $currency = $this->getCurrency();
        $products = $this->productsService->getProducts();
        $this->filterProducts = collect($products['data']);
        $productsCollection = collect($products['data']);
        $categories = $this->categoryService->getCategories();
        $categories  =  collect($categories["data"]);

        // Filtrar categorías para quedarte solo con las que tienen más de un producto
        $categories = $categories->filter(function ($category) {
            return count($category['products']) > 1; // Suponiendo que tienes una relación "products"
        });

        // Definir la cantidad de productos por página
        $perPage = 6; // Cambia esto al número que quieras por página
        // Paginación
        $currentPage = $request->input('page', 1); // Obtener el número de la página actual desde la URL
        $paginatedProducts = $productsCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        // Crear una instancia de LengthAwarePaginator
        $productsPaginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedProducts,
            $productsCollection->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        return view('app.shop', compact('countryCurrencies', 'currency', 'productsPaginator', 'categories'));
    }
    public function getFilteredProducts(Request $request)
    {
        if (count($this->filterProducts) == 0 || empty($this->filterProducts)) {
            $products = $this->productsService->getProducts();
            $this->filterProducts = collect($products['data']);
        }

        // Filtrar productos según los criterios
        if ($request->has('color')) {
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($request) {
                return in_array($product['color'], $request->input('color'));
            });
        }

        if ($request->has('size')) {
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($request) {
                return in_array($product['size'], $request->input('size'));
            });
        }

        if ($request->has('price_min')) {
            $this->filterProducts = $this->filterProducts->where('price', '>=', $request->input('price_min'));
        }

        if ($request->has('price_max')) {
            $this->filterProducts = $this->filterProducts->where('price', '<=', $request->input('price_max'));
        }

        if ($request->has('name')) {
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($request) {
                return str_contains(strtolower($product['name']), strtolower($request->input('name')));
            });
        }

        if ($request->has('brand')) {
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($request) {
                return in_array($product['brand'], $request->input('brand'));
            });
        }

        // Retornar los productos filtrados
        return response()->json($this->filterProducts);

        return $this->filterProducts;
    }
}
