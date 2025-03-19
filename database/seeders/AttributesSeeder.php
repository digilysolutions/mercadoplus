<?php

namespace Database\Seeders;

use App\Models\Attribute as ModelsAttribute;
use App\Models\AttributeProduct;
use App\Models\Attributes;
use App\Models\AttributesModel;
use App\Models\AttributesProduct;
use Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            ['name' => 'Color'],
            ['name' => 'Talla'],
            ['name' => 'Almacenamiento'],
        ];

        foreach ($attributes as $attribute) {
            AttributesModel::create($attribute);
        }
    }
}
