<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            ['name' => 'Deportes', 'description' => 'Productos para actividades deportivas', 'is_activated' => true],
            ['name' => 'Ropa', 'description' => 'Artículos de vestir', 'is_activated' => true],
            ['name' => 'Comida', 'description' => 'Productos alimenticios', 'is_activated' => true],
            ['name' => 'Tecnología', 'description' => 'Artículos tecnológicos y electrónicos', 'is_activated' => true],
            ['name' => 'Hogar', 'description' => 'Productos para el hogar y decoración', 'is_activated' => true],
            ['name' => 'Salud', 'description' => 'Productos para la salud y el bienestar', 'is_activated' => true],
            ['name' => 'Juguetes', 'description' => 'Juguetes y productos para niños', 'is_activated' => true],
            // Agrega más etiquetas según sea necesario
        ];

        foreach ($tags as $tagData) {
            Tag::create($tagData);
        }
    }
}
