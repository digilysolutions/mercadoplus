<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Services\BrandServices;
use App\Services\CountryCurrencyService;
use App\Services\DeliveryZonesService;
use App\Services\LocationService;
use App\Services\ModelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeliveryZonesController extends Controller
{

    protected $deliveryZones;
    protected $locationService;
    protected $countryCurrencyService;

    public function __construct(DeliveryZonesService $deliveryZones, CountryCurrencyService $countryCurrencyService, LocationService $locationService)
    {
        $this->locationService = $locationService;
        $this->countryCurrencyService = $countryCurrencyService;
        $this->deliveryZones = $deliveryZones;
    }
    public function index()
    {
        $deliveryZones = $this->deliveryZones->getDeliveryZones();
        $deliveryZones  = $deliveryZones["data"];
        $locations = $this->locationService->getLocations();
        $locations  = $locations["data"];
        $currency = $this->countryCurrencyService->getCountryCurrency();
        $currencies  = $currency["data"];
        foreach ($currencies as $key => $currency) {
            if ($currency['code_currency_default']) {
                $currency =  $currency;
                break;
            }
        }       

        return view('admin.deliveryZones.index', compact('deliveryZones', 'locations', 'currency'));
    }
    public function store(Request $request)
    {
        $data = $request->only(
            [
                'name',
                'location_id',
                'price',
                'delivery_time',
                'time_unit',
                'is_activated'
            ]
        );
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $this->deliveryZones->createDeliveryZone($data);
        return  $this->index();
    }

    public function show($id)
    {
        $deliveryZone = $this->deliveryZones->showDeliveryZone($id);
        return response()->json($deliveryZone);
    }
    public function delete($id)
    {
        $deliveryZone = $this->deliveryZones->deleteDeliveryZone($id);
        return response()->json($deliveryZone);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(
            [
                'name',
                'location_id',
                'price',
                'delivery_time',
                'time_unit',
                'is_activated'
            ]
        );

        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $this->deliveryZones->updateDeliveryZone($id, $data);
        return  $this->index();
    }
}
