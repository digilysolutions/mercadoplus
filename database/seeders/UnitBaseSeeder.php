<?php

namespace Database\Seeders;

use App\Models\UnitBase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitBase::create(['name' => 'Unidades de Longitud','is_activated'=>true]);
        UnitBase::create(['name' => 'Unidades de Masa','is_activated'=>true]);
        UnitBase::create(['name' => 'Unidades de Capacidad y Volumen','is_activated'=>true]);        
        UnitBase::create(['name' => 'Unidades de Tiempo','is_activated'=>true]);      
        UnitBase::create(['name' => 'Otras Unidades','is_activated'=>true]);
    }
}
