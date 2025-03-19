<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratings = [
            [
                'rating' => 4.5,
                'date' => now(),
                'product_id' =>1 ,
                'writer_id' => 1,
                'is_activated' => true,
            ],
            [
                'rating' => 3.2,
                'date' => now(),
                'writer_id' =>2 ,
                'product_id' =>2 ,
                'is_activated' => true,
            ],
            // Agrega más registros según sea necesario
        ];

        // Inserta los datos en la tabla `ratings`
        foreach ($ratings as $rating) {
            Rating::create($rating);
        }
    }
}
