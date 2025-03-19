<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\ModelProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelProductSeeder extends Seeder
{
    public function run()
    {
        $brands = Brand::pluck('id')->toArray(); // Obtener los IDs de las marcas

        $models = [
            [
                'name' => 'Camiseta Nike',
                'description' => 'Camiseta de algodón Nike',
                'year' => 2022,
                'brand_id' => $brands[array_rand($brands)],
                'characteristics' => 'Transpirable, comodidad, tamaño ajustado',
                'is_activated' => true,
            ],
            [
                'name' => 'Zapatos Adidas',
                'description' => 'Calzado deportivo Adidas para correr',
                'year' => 2022,
                'brand_id' => $brands[array_rand($brands)],
                'characteristics' => 'Ligero, con soporte acolchado',
                'is_activated' => true,
            ],
            [
                'name' => 'Sopa Heinz',
                'description' => 'Sopa de tomate Heinz',
                'year' => 2021,
                'brand_id' => $brands[array_rand($brands)],
                'characteristics' => 'Sabor casero, listo para calentar',
                'is_activated' => true,
            ],
            // Otras modelos
        ];

        foreach ($models as $modelData) {
            ModelProduct::create($modelData);
        }
    }

}
