<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index()
    {
        $categories = $this->countryService->getCountries();

        $categories  = $categories["data"];
        return view('<admin class="country"></admin>.index', compact('categories'));
    }
}
