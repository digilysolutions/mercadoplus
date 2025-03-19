<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::create(['name' => 'Municipio Especial Isla de la Juventud','country_id'=>1]);
       Province::create(['name' => 'Pinar del Río','country_id'=>1]);
        Province::create(['name' => 'Artemisa','country_id'=>1]);
        Province::create(['name' => 'Mayabeque','country_id'=>1]);
        Province::create(['name' => 'La Habana','country_id'=>1]); 
        Province::create(['name' => 'Matanzas','country_id'=>1]);        
        Province::create(['name' => 'Villa Clara','country_id'=>1]);
        Province::create(['name' => 'Cienfuegos','country_id'=>1]);
        Province::create(['name' => 'Santi Spiritu','country_id'=>1]);
        Province::create(['name' => 'Ciego de Ávila','country_id'=>1]);
        Province::create(['name' => 'Camaguey','country_id'=>1]);
        Province::create(['name' => 'Las Tunas','country_id'=>1]);
        Province::create(['name' => 'Holguín','country_id'=>1]);
        Province::create(['name' => 'Granma','country_id'=>1]);
        Province::create(['name' => 'Santiago de Cuba','country_id'=>1]);
        Province::create(['name' => 'Guantánamo','country_id'=>1]);

      
       
        
        
        
       
    }
}
