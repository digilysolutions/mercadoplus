<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $brands = [
            ['name' => 'Nike', 'description' => 'Marca de ropa y calzado deportivo', 'is_activated' => true],
            ['name' => 'Adidas', 'description' => 'Marca de ropa y calzado deportivo', 'is_activated' => true],
            ['name' => 'Coca-Cola', 'description' => 'Marca de bebidas', 'is_activated' => true],
            ['name' => 'Heinz', 'description' => 'Marca de alimentos enlatados', 'is_activated' => true],
            // Otras marcas
        ];

        foreach ($brands as $brandData) {
            Brand::create($brandData);
        }
    }
}
