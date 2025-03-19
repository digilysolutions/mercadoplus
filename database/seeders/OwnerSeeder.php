<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::create(['people_id' =>1 ,'is_activated'=>true, 'person_statuses_message'=>'estoy activo pero es una prueba']);

     
          
         
    }
}
