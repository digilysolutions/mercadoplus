<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Reviews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'product_id' => 1,
            'comment' => "Exelente empresa, encuentro todo lo que necesito",
            'date' => date('Y-m-d'),
            'writer_id' => 1,

            'is_activated' => true
        ]);
        Review::create([
            'product_id' => 2,
            'comment' => "EEs otra pruea para ver como funciona ",
            'date' => date('Y-m-d'),
            'writer_id' => 1,
            'is_activated' => true
        ]);

        Review::create([
            'business_id' => 1,
            'comment' => "Para tener en cuenta la cantidad e caracteres que puedo mostrar",
            'date' => date('Y-m-d'),
            'writer_id' => 2,
            'is_activated' => true
        ]);


        Review::create([
            'business_id' => 1,
            'comment' => "Ultima en la fila, porque solo voy a mostar algunod",
            'date' => date('Y-m-d'),
            'writer_id' => 1,
            'is_activated' => true
        ]);

        Review::create([
            'business_id' => 1,
            'comment' => "Otro de prueba",
            'date' => date('Y-m-d'),
            'writer_id' => 2,
            'is_activated' => true
        ]);
    }
}
