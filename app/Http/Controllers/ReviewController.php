<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{

    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }
    public function index()
    {
        $reviews = $this->reviewService->getReviews();
        $reviews  = $reviews["data"];
        return view('admin.reviews.index', compact('reviews'));
    }
    public function store(Request $request)
    {
        /* The code snippet you provided is from a PHP Laravel controller `CategoryController`. Let's
       break down the code: */
        $data = $request->only([
            'name', 
            'business_id',
            'product_id',
            'comment',
            'date',
            'writer_id',
            'is_activated'
        ]);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $review = $this->reviewService->createReview($data);
        return $this->index();
    }

    public function show($id)
    {
        // Obtiene la reseña por ID
        $review = $this->reviewService->showReview($id);
        // Devuelve la reseña como respuesta JSON
        return response()->json($review);
    }
    public function delete($id)
    {
        // Obtiene la reseña por ID
        $review = $this->reviewService->deleteReview($id);
        // Devuelve la reseña como respuesta JSON
        return response()->json($review);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name', 
            'business_id',
            'product_id',
            'comment',
            'date',
            'writer_id',
            'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;

        $review = $this->reviewService->updateReview($id, $data);
        // Devuelve la reseña actualizada como respuesta JSON o redirige a la lista

        return  $this->index();
    }
}
