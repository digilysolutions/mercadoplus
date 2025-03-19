<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Unidad base: Longtud (id:1)
        Unit::create(['name' => 'kilómetro', 'shortname' => 'km', 'unitbase_id' => 1, 'is_activated' => true]);
        Unit::create(['name' => 'hectómetro', 'shortname' => 'hm', 'unitbase_id' => 1, 'is_activated' => true]);
        Unit::create(['name' => 'decámetro', 'shortname' => 'dam', 'unitbase_id' => 1, 'is_activated' => true]);
        Unit::create(['name' => 'metro', 'shortname' => 'm', 'unitbase_id' => 1, 'is_activated' => true]);
        Unit::create(['name' => 'decímetro', 'shortname' => 'dm', 'unitbase_id' => 1, 'is_activated' => true]);
        Unit::create(['name' => 'centímetro', 'shortname' => 'cm', 'unitbase_id' => 1, 'is_activated' => true]);
        Unit::create(['name' => 'milímetro', 'shortname' => 'mm', 'unitbase_id' => 1, 'is_activated' => true]);

        //Unidad base: Masa (id:2)
        Unit::create(['name' => 'tonelada', 'shortname' => 't', 'unitbase_id' => 2, 'is_activated' => true]);
        Unit::create(['name' => 'kilogramo', 'shortname' => 'kg', 'unitbase_id' => 2, 'is_activated' => true]);
        Unit::create(['name' => 'hectogramo', 'shortname' => 'hg', 'unitbase_id' => 2, 'is_activated' => true]);
        Unit::create(['name' => 'decagramo', 'shortname' => 'dag', 'unitbase_id' => 2, 'is_activated' => true]);
        Unit::create(['name' => 'gramo', 'shortname' => 'g', 'unitbase_id' => 2, 'is_activated' => true]);
        Unit::create(['name' => 'decigramo', 'shortname' => 'dg', 'unitbase_id' => 2, 'is_activated' => true]);
        Unit::create(['name' => 'centigramo', 'shortname' => 'cg', 'unitbase_id' => 2, 'is_activated' => true]);
        Unit::create(['name' => 'miligramo', 'shortname' => 'mg', 'unitbase_id' => 2, 'is_activated' => true]);
        Unit::create(['name' => 'libra', 'shortname' => 'lb', 'unitbase_id' => 2, 'is_activated' => true]);
        Unit::create(['name' => 'onza', 'shortname' => 'oz', 'unitbase_id' => 2, 'is_activated' => true]);

        //Unidad base: Capacidad y volumen (id:3)
        Unit::create(['name' => 'kilolitro', 'shortname' => 'kl', 'unitbase_id' => 3, 'is_activated' => true]);
        Unit::create(['name' => 'hectolitro', 'shortname' => 'hl', 'unitbase_id' => 3, 'is_activated' => true]);
        Unit::create(['name' => 'decalitro', 'shortname' => 'dal', 'unitbase_id' => 3, 'is_activated' => true]);
        Unit::create(['name' => 'litro', 'shortname' => 'l', 'unitbase_id' => 3, 'is_activated' => true]);
        Unit::create(['name' => 'decilitro', 'shortname' => 'dl', 'unitbase_id' => 3, 'is_activated' => true]);
        Unit::create(['name' => 'centilitro', 'shortname' => 'cl', 'unitbase_id' => 3, 'is_activated' => true]);
        Unit::create(['name' => 'mililitro', 'shortname' => 'ml', 'unitbase_id' => 3, 'is_activated' => true]);

        //Unidad base: tiempo (id:4)
        Unit::create(['name' => 'segundo', 'shortname' => 's', 'unitbase_id' => 4, 'is_activated' => true]);
        Unit::create(['name' => 'minuto', 'shortname' => 'min', 'unitbase_id' => 4, 'is_activated' => true]);
        Unit::create(['name' => 'hora', 'shortname' => 'h', 'unitbase_id' => 4, 'is_activated' => true]);
        Unit::create(['name' => 'día', 'shortname' => 'd', 'unitbase_id' => 4, 'is_activated' => true]);
        Unit::create(['name' => 'mes', 'shortname' => 'mes', 'unitbase_id' => 4, 'is_activated' => true]);
        Unit::create(['name' => 'año', 'shortname' => 'y', 'unitbase_id' => 4, 'is_activated' => true]);

        //Unidad base: Otras Unidades (id:4)
        Unit::create(['name' => 'paquete', 'shortname' => 'pq', 'unitbase_id' => 5, 'is_activated' => true]);
        Unit::create(['name' => 'combo', 'shortname' => 'cbm', 'unitbase_id' => 5, 'is_activated' => true]);
    }
}
