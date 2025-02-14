<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryCurrencyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DeliveryZonesController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LocaltionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitBaseController;
use App\Http\Controllers\GoogleController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google-callback', [GoogleController::class, 'handleGoogleCallback']);



// Rutas que necesitan autenticación y roles específicos
Route::middleware(['auth'])->group(function () {
  //  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('permission:view reports');
});

// Rutas de administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
   //Units
Route::get('/admin/units', [UnitController::class, 'index'])->name('units.index');
Route::post('/admin/units', [UnitController::class, 'store'])->name('units.store');
Route::get('/admin/units/{id}', [UnitController::class,  'show']);
Route::delete('/admin/units/{id}', [UnitController::class, 'delete']);
Route::put('/admin/units/{id}', [UnitController::class, 'update'])->name('units.update');
});



Route::get('/', [homeController::class,  'index']);
Route::get('/exchangerate/{currency}', [homeController::class,  'productsExchangeRates'])->name('products.exchangerate');
Route::post('/products/exchangeRateProduct', [homeController::class,  'exchangeRateProduct'])->name('product.exchangeRateProduct');
Route::get('/getcurrency', [homeController::class,  'getCurrency']);
Route::get('/products/detailsproduct/{id}', [homeController::class,  'detailsProduct'])->name('product.detailsproduct');
Route::get('/products/checkout/{iddomicilio}', [homeController::class,  'checkout'])->name('product.checkout');
Route::post('/products/orderpurchase', [homeController::class,  'orderPurchase'])->name('products.orderpurchase');

Route::get('/admin', function () {
    return view('admin.index'); // Esto debería funcionar si la vista existe
});

//Categories
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/admin/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/category/{id}', [CategoryController::class, 'show']);
Route::delete('/admin/category/{id}', [CategoryController::class, 'delete']);
Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::post('/admin/storeCategoryName/productcategories', [CategoryController::class, 'storeCategoryName'])->name('category.storeCategoryName');
Route::get('/app/menu/categories', [NavbarController::class, 'getMenuItemsCategories'])->name('menuCategories.index');


//Brands
Route::get('/admin/brands', [BrandController::class, 'index'])->name('brands.index');
Route::post('/admin/brands', [BrandController::class, 'store'])->name('brand.store');
Route::get('/admin/brands/{id}', [BrandController::class, 'show']);
Route::delete('/admin/brands/{id}', [BrandController::class, 'delete']);
Route::put('/admin/brands/{id}', [BrandController::class, 'update'])->name('brand.update');

//Models
Route::get('/admin/models', [ModelController::class, 'index'])->name('models.index');
Route::post('/admin/models', [ModelController::class, 'store'])->name('model.store');
Route::get('/admin/models/{id}', [ModelController::class, 'show']);
Route::delete('/admin/models/{id}', [ModelController::class, 'delete']);
Route::put('/admin/models/{id}', [ModelController::class, 'update'])->name('model.update');
Route::post('/admin/add/models', [ModelController::class, 'addModelBrand'])->name('model.addModelBrand');

//UnitsBase
Route::get('/admin/unitsbase', [UnitBaseController::class, 'index'])->name('unitsbase.index');
Route::post('/admin/unitbase', [UnitBaseController::class, 'store'])->name('unitsbase.store');
Route::get('/admin/unitbase/{id}', [UnitBaseController::class,  'show']);
Route::delete('/admin/unitbase/{id}', [UnitBaseController::class, 'delete']);
Route::put('/admin/unitbase/{id}', [UnitBaseController::class, 'update'])->name('unitsbase.update');



//Countries
Route::get('/admin/countries', [CountryController::class, 'index'])->name('countries.index');

//Provinces
Route::get('/admin/provinces', [ProvinceController::class, 'index'])->name('provinces.index');

//Municipalities
Route::get('/admin/municpalities', [MunicipalityController::class, 'index'])->name('municpalities.index');

//Locations
Route::get('/admin/locations', [LocationController::class, 'index'])->name('locations.index');
Route::post('/admin/locations', [LocationController::class, 'store'])->name('location.store');
Route::get('/admin/locations/{id}', [LocationController::class,  'show']);
Route::delete('/admin/locations/{id}', [LocationController::class, 'delete']);
Route::put('/admin/locations/{id}', [LocationController::class, 'update'])->name('location.update');

//Currencies
Route::get('/admin/currencies', [CurrencyController::class, 'index'])->name('currencies.index');
Route::post('/admin/currencies', [CurrencyController::class, 'store'])->name('currency.store');
Route::get('/admin/currencies/{id}', [CurrencyController::class,  'show']);
Route::delete('/admin/currencies/{id}', [CurrencyController::class, 'delete']);
Route::put('/admin/currencies/{id}', [CurrencyController::class, 'update'])->name('currency.update');

//Countries Currencies
Route::get('/admin/countriescurrencies', [CountryCurrencyController::class, 'index'])->name('countrycurrency.index');
Route::post('/admin/countriescurrencies', [CountryCurrencyController::class, 'store'])->name('countrycurrency.store');
Route::get('/admin/countriescurrencies/{id}', [CountryCurrencyController::class,  'show']);
Route::delete('/admin/countriescurrencies/{id}', [CountryCurrencyController::class, 'delete']);
Route::put('/admin/countriescurrencies/{id}', [CountryCurrencyController::class, 'update'])->name('countrycurrency.update');

//Countries Reviews
Route::get('/admin/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/admin/reviews', [ReviewController::class, 'store'])->name('review.store');
Route::get('/admin/reviews/{id}', [ReviewController::class,  'show']);
Route::delete('/admin/reviews/{id}', [ReviewController::class, 'delete']);
Route::put('/admin/reviews/{id}', [ReviewController::class, 'update'])->name('review.update');

//Products
Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('product.store');
Route::get('/admin/products/{id}', [ProductController::class,  'show'])->name('product.show');
Route::get('/admin/products/{id}/edit', [ProductController::class,  'edit'])->name('product.edit');
Route::delete('/admin/products/{id}', [ProductController::class, 'delete']);
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('product.update');

//Business
Route::get('/admin/businesses', [BusinessController::class, 'index'])->name('businesses.index');
Route::put('/admin/businesses/{id}', [BusinessController::class, 'update'])->name('business.update');

//etiquetas
Route::get('/admin/tags', [TagController::class, 'index'])->name('tags.index');
Route::post('/admin/name/tags', [TagController::class, 'storeNewTag'])->name('tag.storeNewTag');
Route::post('/admin/tags', [TagController::class, 'store'])->name('tag.store');
Route::get('/admin/tags/{id}', [TagController::class,  'show']);
Route::delete('/admin/tags/{id}', [TagController::class, 'delete']);
Route::put('/admin/tags/{id}', [TagController::class, 'update'])->name('tag.update');
Route::get('/admin/searchTags/tags', [TagController::class, 'searchTags']);

//personas
Route::get('/admin/persons', [PersonController::class, 'index'])->name('persons.index');
Route::get('/admin/persons/create', [PersonController::class, 'create'])->name('persons.create');
Route::post('/admin/persons', [PersonController::class, 'store'])->name('person.store');
Route::get('/admin/persons/{id}', [PersonController::class,  'show']);
Route::delete('/admin/persons/{id}', [PersonController::class, 'delete']);
Route::put('/admin/persons/{id}', [PersonController::class, 'update'])->name('person.update');

//puntuación
Route::get('/admin/ratings', [RatingController::class, 'index'])->name('ratings.index');
Route::get('/admin/ratings/create', [RatingController::class, 'create'])->name('rating.create');
Route::post('/admin/ratings', [RatingController::class, 'store'])->name('rating.store');
Route::get('/admin/ratings/{id}', [RatingController::class,  'show']);
Route::delete('/admin/ratings/{id}', [RatingController::class, 'delete']);
Route::put('/admin/ratings/{id}', [RatingController::class, 'update'])->name('rating.update');

//atributos
Route::get('/admin/attributes', [AttributeController::class, 'index'])->name('attributes.index');
Route::post('/admin/attributes', [AttributeController::class, 'store'])->name('attribute.store');
Route::get('/admin/attributes/{id}', [AttributeController::class,  'show']);
Route::delete('/admin/attributes/{id}', [AttributeController::class, 'delete']);
Route::put('/admin/attributes/{id}', [AttributeController::class, 'update'])->name('attribute.update');


//terminos
Route::get('/admin/terms', [TermsController::class, 'index'])->name('terms.index');
Route::post('/admin/terms', [TermsController::class, 'store'])->name('term.store');
Route::get('/admin/terms/{id}', [TermsController::class,  'show']);
Route::delete('/admin/terms/{id}', [TermsController::class, 'delete']);
Route::get('/admin/terms/attribute/{id}', [TermsController::class, 'attribute_terms'])->name('terms.attribute');
Route::put('/admin/terms/{id}', [TermsController::class, 'update'])->name('term.update');
Route::get('/admin/terms/attribute/json/{id}', [TermsController::class, 'attribute_terms_json']);



//Envio por zona
Route::get('/admin/deliveryZones', [DeliveryZonesController::class, 'index'])->name('deliveryZones.index');
Route::post('/admin/deliveryZones', [DeliveryZonesController::class, 'store'])->name('deliveryZone.store');
Route::get('/admin/deliveryZones/{id}', [DeliveryZonesController::class,  'show']);
Route::delete('/admin/deliveryZones/{id}', [DeliveryZonesController::class, 'delete']);
Route::put('/admin/deliveryZones/{id}', [DeliveryZonesController::class, 'update'])->name('deliveryZone.update');


//Cart
Route::post('/cart/add', [CartController::class, 'addProduct'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeProduct'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/productExchangeRate', [CartController::class, 'productExchangeRate']);
Route::get('/cart/show/info', [CartController::class, 'showInfoCart'])->name('cart.showCart');
Route::get('/cart/infoCart', [CartController::class, 'infoCart']);


Route::get('/cart/exitProduct/{id}', [CartController::class, 'existProduct']);

Route::post('/reviews/add', [homeController::class, 'storeReview'])->name('review.add');
Route::get('/customer-service', [homeController::class, 'customerservice']);
Route::get('/contact', [homeController::class, 'contact']);
Route::post('/sendmessage', [homeController::class, 'sendMessageContact'])->name('contact.sendmessage');
Route::get('/specialoffer', [homeController::class, 'specialOffer']);
Route::get('/shop', [homeController::class, 'shop']);
Route::get('/shop', [homeController::class, 'shop']);
