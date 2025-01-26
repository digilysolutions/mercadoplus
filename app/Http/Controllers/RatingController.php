<?php

namespace App\Http\Controllers;

use App\Services\RatingService;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    protected $ratingService;

    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }
    public function index()
    {
        $data = $this->ratingService->getRatings();
        $ratings = $data["data"];
        return view('admin.ratings.index', compact('ratings'));
    }
    public function store(Request $request)
    {
        $data = $request->only(['name', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $this->ratingService->createRating($data);
        return $this->index();
    }

    public function show($id)
    {
        // Obtiene la etiqueta por ID
        $rating = $this->ratingService->showRating($id);
        // Devuelve la puntuacion como respuesta JSON
        return response()->json($rating);
    }
    public function delete($id)
    {        // Obtiene la puntacion por ID
        $rating = $this->ratingService->deleteRating($id);
        // Devuelve la puntuacion como respuesta JSON
        return response()->json($rating);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name',  'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;

        $tag = $this->ratingService->updateRating($id, $data);
        // Devuelve la etqiueta actualizada como respuesta JSON o redirige a la lista        
        return  $this->index();
    }
}
