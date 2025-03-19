<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeProductController;
use App\Http\Controllers\AttributesModelController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BusinessCertificationController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessEmployeeController;
use App\Http\Controllers\BusinessProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryCurrencyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryZoneController;
use App\Http\Controllers\DiscountsByExpirationDateController;
use App\Http\Controllers\DiscountsByImportantDateController;
use App\Http\Controllers\DiscountsByQuantityController;
use App\Http\Controllers\DiscountsByWeightController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ModelProductController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PersonStatusController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDeliveryZoneController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductProductCategoryController;
use App\Http\Controllers\ProductsCurrencyController;
use App\Http\Controllers\ProductsVariationController;
use App\Http\Controllers\ProductTagController;
use App\Http\Controllers\ProductTermController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaxsRateController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UnitBaseController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,  'index']);
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/shop', [homeController::class, 'shop'])->name('product.shop');
Route::get('/products/detailsproduct/{id}', [homeController::class,  'detailsProduct'])->name('product.detailsproduct');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
Route::get('/error404', function () {
    return view('error404'); // Asegúrate de tener este view creado
});
Route::get('/notaccess', function () {
    return view('not-access'); // Asegúrate de tener este view creado
});
//Registro (register):
Route::get('register', function () {
    return view('register');
})->name('register');

//Recuperación de contraseña (forgot-password):
Route::get('forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

//Restablecimiento de contraseña (reset-password):
Route::get('reset-password/{token}', function () {
    return view('auth.reset-password');
})->name('password.reset');

// Rutas de inicio de sesión
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
//Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store']);

// Rutas de registro
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Rutas de recuperación de contraseña
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

// Rutas de restablecimiento de contraseña
Route::get('reset-password/{token}', [PasswordResetLinkController::class, 'edit'])
    ->name('password.reset');
Route::post('reset-password', [PasswordResetLinkController::class, 'update'])
    ->name('password.update');


Route::get('/verify/{token}', [RegisteredUserController::class, 'verify'])->name('verify');
Route::get('/user/register', [RegisteredUserController::class, 'thankYou'])->name('thankYou');
// Ruta para procesar el código de verificación
Route::post('/verify-email', [RegisteredUserController::class, 'verifyEmail'])->name('verifyEmail');
Route::middleware('auth')->group(function () {


    //------------------generado por el crud -----
    Route::middleware('auth')->group(function () {

        Route::resource('admin/countries', CountryController::class);
        Route::resource('admin/contacts', ContactController::class);
        Route::resource('admin/provinces', ProvinceController::class);
        Route::resource('admin/locations', LocationController::class);
        Route::resource('admin/person-statuses', PersonStatusController::class);
        Route::resource('admin/people', PersonController::class);
        Route::resource('admin/currencies', CurrencyController::class);
        Route::resource('admin/owners', OwnerController::class);
        Route::resource('admin/businesses', BusinessController::class);
        Route::resource('admin/employees', EmployeeController::class);
        Route::resource('admin/customers', CustomerController::class);
        Route::resource('admin/certifications', CertificationController::class);
        Route::resource('admin/business-certifications', BusinessCertificationController::class);
        Route::resource('admin/tags', TagController::class);
        Route::post('/admin/tags/add', [TagController::class, 'addTags'])->name('tags.add');


        Route::resource('admin/product-categories', ProductCategoryController::class);
        Route::resource('admin/warehouses', WarehouseController::class);
        Route::resource('admin/unit-bases', UnitBaseController::class);
        Route::resource('admin/units', UnitController::class);
        Route::resource('admin/brands', BrandController::class);
        //modelo del producto
        Route::resource('admin/model-products', ModelProductController::class);
        Route::post('admin/model/add', [ModelProductController::class, 'addModel'])->name('model.add');
        //Product
        Route::resource('admin/products', ProductController::class);
        Route::get('admin/show-list/{id}', [ProductController::class, 'showList'])->name('products.show-list');

        Route::resource('admin/discounts-by-expiration-dates', DiscountsByExpirationDateController::class);
        Route::resource('admin/discounts-by-important-dates', DiscountsByImportantDateController::class);
        Route::resource('admin/discounts-by-quantities', DiscountsByQuantityController::class);
        Route::resource('admin/discounts-by-weights', DiscountsByWeightController::class);
        Route::resource('admin/taxs-rates', TaxsRateController::class);
        Route::resource('admin/stocks', StockController::class);
        Route::resource('admin/variations', VariationController::class);
        Route::resource('admin/ratings', RatingController::class);
        Route::resource('admin/reviews', ReviewController::class);
        Route::resource('admin/terms', TermController::class);
        Route::get('/admin/terms/attribute/{id}', [TermController::class, 'attribute_terms'])->name('terms.attribute');
        Route::get('/admin/terms/attribute/{attributeId}', [TermController::class, 'findByAttributeId']);
        Route::resource('admin/country-currencies', CountryCurrencyController::class);
        Route::resource('admin/product-product-categories', ProductProductCategoryController::class);
        Route::resource('admin/business-employees', BusinessEmployeeController::class);
        Route::resource('admin/products-variations', ProductsVariationController::class);
        Route::resource('admin/product-tags', ProductTagController::class);
        Route::resource('admin/product-images', ProductImageController::class);
        Route::resource('admin/products-currencies', ProductsCurrencyController::class);
        Route::resource('admin/business-products', BusinessProductController::class);
        Route::resource('admin/attributes-models', AttributesModelController::class);
        Route::resource('admin/product-terms', ProductTermController::class);
        Route::resource('admin/delivery-zones', DeliveryZoneController::class);
        Route::resource('admin/product-delivery-zones', ProductDeliveryZoneController::class);
        Route::resource('admin/status-orders', StatusOrderController::class);
        Route::resource('admin/orders', OrderController::class);
        Route::resource('admin/order-products', OrderProductController::class);
        Route::resource('admin/municipalities', MunicipalityController::class);
    });






    //Carga inicial con excel
    Route::get('/import', [ExcelController::class, 'importView'])->name('import.view')->middleware('role:Administrador');
    Route::post('/import', [ExcelController::class, 'import'])->name('import')->middleware('role:Administrador');



    //users
    Route::resource('users', UserController::class)->middleware('role:Administrador');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //---------nuevas rutas
    Route::resource('people', PersonController::class);
});

Route::get('/user/dashboard', function () {
    return view('user.dashboard'); // Vista para el dashboard del usuario
})->name('user.dashboard');

//Route::get('/dashboard', [DashboardController::class, 'index']);


Route::get('/admin/dashboard', [DashboardController::class, 'dashboardAmdin'])->name('admin.dashboard');
//Route::get('/admin/dashboard', [DashboardController::class, 'dashboardAmdin'])->name('dashboard');

Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google-callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/app/menu/categories', [NavbarController::class, 'getMenuItemsCategories'])->name('menuCategories.index');
Route::get('/cart/show/info', [CartController::class, 'showInfoCart'])->name('cart.showCart');
Route::get('/products/checkout/{iddomicilio}', [HomeController::class,  'checkout'])->name('product.checkout');
Route::get('/products/detailsproduct/{id}', [HomeController::class,  'detailsProduct'])->name('product.detailsproduct');
Route::get('/products/exchangeRates/{currency}',[ProductController::class, 'productsExchangeRates']);
Route::post('/products/exchangeRates',[ProductController::class, 'getProductExchangeRate']);
Route::post('/products/exchangeRateProduct', [HomeController::class,  'exchangeRateProduct'])->name('product.exchangeRateProduct');
Route::get('/contact', [homeController::class, 'contact']);
Route::get('/customer-service', [homeController::class, 'customerservice']);

require __DIR__ . '/auth.php';
