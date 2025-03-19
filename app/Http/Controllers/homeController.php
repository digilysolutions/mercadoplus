<?php

namespace App\Http\Controllers;

use App\Models\CountryCurrency;
use App\Models\DeliveryZone;
use App\Models\Order;
use App\Models\Person;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    protected $filterProducts;
    public function __construct()
    {

        if (!Session::has('currency')) {
            Session::put('currency', 'USD'); // Establece un valor predeterminado
        }
        $this->filterProducts = collect();
    }
    public function index()
    {
        $currency = $this->getCurrency();
        $products = Product::allActivated();


        $randomProducts = $products->shuffle()->toArray();

        $latestProducts = collect($products);
        $latestProducts = $latestProducts->sortByDesc('created_at')->take(9);

        $featuredProducts = collect($products);
        $featuredProducts = $featuredProducts->sortByDesc('views')->take(9);

        $countryCurrencies = CountryCurrency::allActivated();
        $categories = ProductCategory::allActivated();

        return view('index', compact('latestProducts', 'categories', 'randomProducts', 'countryCurrencies', 'currency', 'featuredProducts'));
    }
    public function productsExchangeRates($currency)
    {
        Log::info($currency);

        $products = $this->productsExchangeRatesCurrency($currency);

        $randomProducts = $products;
        $latestProducts = collect($products);
        $latestProducts = $latestProducts->sortByDesc('created_at')->take(8);
        shuffle($randomProducts);

        $countryCurrencies = CountryCurrency::allActivated();
        $this->updateCurrency($currency);
        $currency =     $this->getCurrency();
        $cart =  $this->productExchangeRate($currency, $products);

        return  ['cart' => $cart, 'latestProducts' => $latestProducts];
    }

    public function detailsProduct($idProduct)
    {

        $currency = Session::get('currency');
        $dataProduct = [
            'products_id' => [$idProduct],
            'currency' => $currency
        ];
        $request = new Request($dataProduct);
        $product = $this->getProductExchangeRate($request);
        $products = Product::allActivated();
        $randomProducts = $products->shuffle()->toArray();


        //$data = $this->productsService->showProduct($idProduct);
        //$product = $data['data']['product'];
        // $averageRating = $data['data']['averageRating'];
        // $attributeTerms = $data['data']['attributeTerms'];
        // $currentPrice = $data['data']['currentPrice'];

        //$averageRating = $product['averageRating'];
        // $attributeTerms =$product['attributeTerms'];
        // $currentPrice = $product['currentPrice'];


        $currency = $this->getCurrency();
        $countryCurrencies = CountryCurrency::allActivated();
        $comments = $product->reviews;
        $ratings = $product->ratings;

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

    public function show(int $id)
    {
        $product = Product::where('id',$id)->first();
        if ($product == null)
            return ['message' => 'No se encuentra el producto '];



        // Calcular el total de puntuaciones
        $totalRatings =  $product->rating->sum('rating');

        // Contar el número total de valoraciones
        $countRatings  = $product->rating->count();

        // Evitar división por cero
        $averageRating = $countRatings > 0 ? $totalRatings / $countRatings : 0;

        // Obtener atributos y términos usando el método del modelo
        $attributes = $product->getAttributesWithTerms();



        // Obtener la fecha actual
        $currentDate = Carbon::now();
        // Inicializar el precio que enviarás a la vista
        $currentPrice = 0; // Precio normal
        // Verificar condiciones para aplicar precio de rebaja y mostrarlo en la vista
        $discountApplicable = false;
        if (!empty($product->discounted_price)) {
            // Comprobar si existen ambas fechas
            if (!empty($product->start_date_discounted_price) && !empty($product->end_date_discounted_price)) {
                $startDate = Carbon::parse($product->start_date_discounted_price);
                $endDate = Carbon::parse($product->end_date_discounted_price);


                if ($startDate->lessThanOrEqualTo($currentDate) && $endDate->greaterThanOrEqualTo($currentDate)) {
                    $discountApplicable = true;
                }
            }
            // Comprobar si solo existe la fecha inicial
            elseif (!empty($product->start_date_discounted_price)) {
                $startDate = Carbon::parse($product->start_date_discounted_price);
                // Validar que la fecha inicial <= fecha actual
                if ($startDate->lessThanOrEqualTo($currentDate)) {
                    $discountApplicable = true;
                }
            }
            // Comprobar si solo existe la fecha final
            elseif (!empty($product->end_date_discounted_price)) {
                $endDate = Carbon::parse($product->end_date_discounted_price);

                // Validar que la fecha final >= fecha actual
                if ($endDate->greaterThanOrEqualTo($currentDate)) {
                    $discountApplicable = true;
                }
            }
        }
        // Si las condiciones se cumplen, asignar el precio de rebaja para mostrarlo en la vista
        if ($discountApplicable) {
            $currentPrice = $product->discounted_price; // Asignar el precio de descuento
        }


        // $product = $this->productExchangeRate( $data['currency'], $product);
        return [
            'product' => $product,
            'averageRating' => $averageRating,
            'attributeTerms' => $attributes,
            'currentPrice' => $currentPrice

        ];
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

        $person = Person::create($dataPerson);

        // }
        $dataComment['writer_id'] = $person['data']['id'];
        $dataComment['is_activated'] = true;
        $comment = Review::create($dataComment);

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
                $deliveryZone = DeliveryZone::create($idDomicilio)['data'];

            $deliveryZones = DeliveryZone::allActivated();
            $deliveryZones = $deliveryZones['data'];


            $currency = $this->getCurrency();
            $countryCurrencies = CountryCurrency::allActivated();
            $countryCurrencies = $countryCurrencies['data'];
            return view('app.checkout', compact('deliveryZone', 'deliveryZones', 'cart', 'currency', 'countryCurrencies'));
        }
        return $this->index();
    }

    public function orderPurchase(Request $request)
    {
        $cart = Session::get('cart');
        DB::beginTransaction();
        try {
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
                $person =  Person::create($detailsPersonBuyer);
                $purchasePerson = $person;

                $detailsPersonPurchase = [
                    'first_name' => $request->name_other_person,
                    'phone' => $request->phone_other_person,
                ];
                if (!empty($request->phone_other_person) && !empty($request->name_other_person)) {

                    $purchasePerson = Person::create($detailsPersonPurchase);
                }

                $phone = $request->input('phone_receives_purchase');
                $name = $request->input('name_receives_purchase');

                if (!empty($phone) && !empty($name)) {
                    $detailsPersonDelivery = [
                        'first_name' => $name,
                        'phone' => $phone,
                    ];
                    $deliveryPerson = Person::create($detailsPersonDelivery);
                    $data['delivery_person_id'] = $deliveryPerson['data']['id'];
                }
                $data['home_delivery'] = isset($data['home_delivery']) && $data['home_delivery'] == 'on' ? 1 : 0;
                if ($data['home_delivery']) {
                    $deliveryZone = DeliveryZone::fid($data['deliveryzona_id']);
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

                $order = Order::create($data);
                DB::commit();

                $this->sendWhatsapp(
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
        } catch (\Exception $ex) {
            Log::info($ex);
        }
        Session::forget('cart');
        return view('/');
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
            $message .= sprintf(
                "%8s | %-30s | $%s\n",
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
        $countryCurrencies = CountryCurrency::allActivated();
        $currency = $this->getCurrency();
        return view('app.customerservice', compact('countryCurrencies', 'currency'));
    }
    public function contact()
    {
        $countryCurrencies = CountryCurrency::allActivated();
        $currency = $this->getCurrency();
        return view('app.contact', compact('countryCurrencies', 'currency'));
    }
    public function specialOffer()
    {
        $countryCurrencies = CountryCurrency::allActivated();
        $products = product::allActivated();
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

        $countryCurrencies = CountryCurrency::allActivated();
        $currency = $this->getCurrency();

        $categories = ProductCategory::allActivated();

        // Filtrar categorías para quedarte solo con las que tienen más de un producto
        $categories = $categories->filter(function ($category) {
            return count($category['products']) > 1; // Suponiendo que tienes una relación "products"
        });

        /*  $products = $this->productsService->getProducts();
        $this->filterProducts = collect($products['data']);
        $productsCollection = collect($products['data']);*/


        $productsCollection = $this->getFilteredProducts($request);


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
    public function productToCategory(Request $request)
    {
        if ($request->has('category_ids')) {

            return view('app.shop');
        }
    }
    public function getFilteredProducts(Request $request)
    {
        if (count($this->filterProducts) == 0 || empty($this->filterProducts)) {
            $products = Product::allActivated();
            $this->filterProducts = collect($products);
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

        // Filtrado por categoría
        if ($request->has('category_ids')) {
            $categoryIds = $request->input('category_ids');
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($categoryIds) {
                return array_intersect($categoryIds, array_column($product['categories'], 'id')) !== [];
            });
        }

        // Retornar los productos filtrados
        //return response()->json($this->filterProducts);

        return $this->filterProducts;
    }

    public function productExchangeRateCart()
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

    private function productExchangeRate($currency, $product)
    {
        $conversionData = $this->convertPrice($product, $currency);
        $product->sale_price = $conversionData['converted_price'];
        $product->discounted_price = $conversionData['converted_discount_price'];
        $product->code_currency_default = $conversionData['currency'];
        return $product;
    }

    public function convertPrices($products, $currency)
    {

        $exchangeRates =  json_decode($products[0]->categories[0]->exchange_rates, true);
        //return    json_decode($products[0]->categories[0]->exchange_rates, true);
        // return    $exchangeRates[ $products[0]->code_currency_default][$currency];
        return $products->map(function (Product $product) use ($currency) {
            $exchangeRates = json_decode($product->categories[0]->exchange_rates, true);
            // $exchangeRates = json_decode($product->categories->exchange_rates, true);
            $priceInOriginalCurrency = $product->sale_price;
            $discounted_priceInOriginalCurrency = $product->discounted_price;

            // Suponiendo que 'USD' es la moneda base para todos los productos
            if (isset($exchangeRates[$product->code_currency_default]) && isset($exchangeRates[$product->code_currency_default][$currency])) {
                $conversionRate = $exchangeRates[$product->code_currency_default][$currency];
                $convertedPrice = $priceInOriginalCurrency * $conversionRate;
                $convertedDiscounted_price = $discounted_priceInOriginalCurrency * $conversionRate;

                $product->sale_price = round($convertedPrice, 2);
                $product->discounted_price = round($convertedDiscounted_price, 2);
                return  $product;
            } else {
                $product->sale_price = $priceInOriginalCurrency; // Sin conversión si el tipo de cambio no existe
                $product->discounted_price = $discounted_priceInOriginalCurrency; // Sin conversión si el tipo de cambio no existe
            }
            return $product;
        });
    }
    public function convertPrice(Product $product, $currency)
    {
        $exchangeRates = json_decode($product->categories[0]->exchange_rates, true);
        if (isset($exchangeRates[$product->categories[0]->code_currency_default]) && isset($exchangeRates[$product->categories[0]->code_currency_default][$currency])) {
            $conversionRate = $exchangeRates[$product->categories[0]->code_currency_default][$currency];
            $convertedPrice = round($product->sale_price * $conversionRate, 2);
            $convertedDiscountPrice = round($product->discounted_price * $conversionRate, 2);
        } else {
            $convertedPrice = $product->sale_price;
            $convertedDiscountPrice = $product->discounted_price;
        }

        return [
            'converted_price' => $convertedPrice,
            'converted_discount_price' => $convertedDiscountPrice,
            'currency' => $currency,
        ];
    }

    public function productsExchangeRatesCurrency($currency)
    {        // $currency = $request->session()->get('currency', 'MN'); // Moneda por defecto
        $products = Product::allActivated();

        foreach ($products as $product) {
            $product = $this->productExchangeRate($currency, $product);
        }
        return  [
            'products' => $products,
            'currency' => $currency
        ];
    }
    public function getProductExchangeRate(Request $request)
    {
        $data = [
            "products" => $request->products_id,
            "currency" => $request->currency
        ];

        $product = Product::where('id', $request->products_id)->first();
        if ($product) {
            // Increment the views only if the product exists
            $product->increment('views');
            $productWithExchangeRate = $this->productExchangeRate($request->currency, $product);
        }
        return $productWithExchangeRate;

        // Crear una colección para almacenar los productos procesados
        $productsCollection = collect();

        // Recorrer cada ID de producto
        foreach ($data['products'] as $product_id) {
            // Obtener el producto por ID
            $product = Product::find($product_id);
            //Incrementar visitas del producto
            $product->increment('views');
            // Verifica si el producto fue encontrado
            if ($product) {
                // Calcular la tasa de cambio para el producto
                $productWithExchangeRate = $this->productExchangeRate($data['currency'], $product);

                // Adicionar el producto procesado a la colección
                $productsCollection->push($productWithExchangeRate);
            }
        }
        return $productsCollection;
        // Retornar la colección de productos junto con la moneda
        return [
            'products' => $productsCollection,
            'currency' => $data['currency']
        ];
    }
}
