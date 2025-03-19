<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Municipality::create(['name' => 'Isla de la Juventud','province_id'=>1]);  
        
        //Municipios de Pinar del Rio
        Municipality::create(['name' => 'Pinar del Río','province_id'=>2]);
        Municipality::create(['name' => 'Viñales','province_id'=>2]);

        //Municipio de la Habana
        Municipality::create(['name' => 'Vedado','province_id'=>5]);
        Municipality::create(['name' => 'Cototrro','province_id'=>5]);
        Municipality::create(['name' => 'Cerro','province_id'=>5]);
        Municipality::create(['name' => 'Centro Haban','province_id'=>5]);
        Municipality::create(['name' => 'Playa','province_id'=>5]);
        Municipality::create(['name' => 'Arroyo Naranjo','province_id'=>5]);
        
        Municipality::create(['name' => 'Boyeros','province_id'=>5]);
        Municipality::create(['name' => 'Diez de Octubre','province_id'=>5]);
        Municipality::create(['name' => 'Guanabacoa','province_id'=>5]);
        Municipality::create(['name' => 'La Habana del Este','province_id'=>5]);
        Municipality::create(['name' => 'La Habana Vieja','province_id'=>5]);
        Municipality::create(['name' => 'La Lisa','province_id'=>5]);
        Municipality::create(['name' => 'Plaza de la Revolución','province_id'=>5]);
        Municipality::create(['name' => 'Marianao','province_id'=>5]);
        Municipality::create(['name' => 'Regla','province_id'=>5]);
        Municipality::create(['name' => 'San Miguel del Padrón','province_id'=>5]);

    }
}
