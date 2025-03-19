<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //category_parent
        ProductCategory::create([
            'name' => 'Alimentos',
            'description' => 'Descripcion de la categoria',
            'path_image' => '/img/upload/alimentos.webp',
         'exchange_rates'=>json_encode([
                    'MN' => ['MLC' => 0.280, 'USD' => 0.340],
                ]),
            'code_currency_default' => 'MN'

        ]);   //Id: 1
        ProductCategory::create([
            'name' => 'Electrodomésticos',
            'path_image' => '/img/upload/electrodomesticos.webp',
           'exchange_rates'=>json_encode(['USD' => ['MLC' => 1.11, 'MN' => 300] ]),
            'code_currency_default' => 'USD'
        ]); //Id: 2

        ProductCategory::create([
            'name' => 'Moda',
            'path_image' => '/img/upload/moda.webp',
            'exchange_rates' => json_encode([
                'MLC' => ['USD' => 0.95, 'MN' => 265],
            ]),
            'code_currency_default' => 'MLC'
        ]); //Id: 3
        ProductCategory::create([
            'name' => 'Tecnología',
            'path_image' => '/img/upload/tecnologias.webp',
            'exchange_rates' => json_encode([
                'USD' => ['MLC' => 1.20, 'MN' => 315]
            ]),
            'code_currency_default' => 'USD'
        ]); //Id: 4

    }
}
