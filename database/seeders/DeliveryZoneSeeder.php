<?php

namespace Database\Seeders;

use App\Models\DeliveryZone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryZone::create([
            'location_id' => 1, // Suponiendo que existe la localidad con ID 1
            'price' => 50.00,
            'delivery_time' => 1,
            'time_unit'=>'Día'
        ]);

        DeliveryZone::create([
            'location_id' => 2, // Suponiendo que existe la localidad con ID 2
            'price' => 100,
            'delivery_time' => 1,
            'time_unit' => 'Hora',
        ]);

    }
}
