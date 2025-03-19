<?php

namespace Database\Seeders;

use App\Models\Attributes;
use App\Models\Term;
use App\Models\Terms;
use Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        $terms = [
        ['name' => 'Rojo', 'attribute_id' => 1],
        ['name' => 'Azul', 'attribute_id' => 1],
        ['name' => 'Verde', 'attribute_id' => 1],
        ['name' => 'S', 'attribute_id' => 2],
        ['name' => 'M', 'attribute_id' => 2],
        ['name' => 'L', 'attribute_id' => 2],
        ['name' => 'XL', 'attribute_id' => 2],
        ['name' => '32GB', 'attribute_id' => 3],
        ['name' => '64GB', 'attribute_id' => 3],
        ['name' => '256GB', 'attribute_id' => 3],
    ];

    foreach ($terms as $term) {
        Term::create($term);
    }

    }
}
