<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name' => 'Nueva gerona',
            'description' => 'Poblado de Gerona',
            'municipality_id' => 1,
            'zip_code' => 25100,
            'address' => 'Calle 25 entre 40 y 42, Nazareno',
            'city' => 'Isla de la Juventud',
            'landmark' => 'nazareno, por la cafeteria',

        ]);
        Location::create([
            'name' => 'La Fe',
            'description' => 'Panel 2',
            'municipality_id' => 1,
            'zip_code' => 25100,
            'address' => 'Calle 25 entre 40 y 42, Panel 2',
            'city' => 'Isla de la Juventud',
            'landmark' => 'Por la barberia',

        ]);



    }
}
