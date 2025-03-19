<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create(
            [

                'email' => 'yrpiloto@nauta.cu',
                'mobile' => '58205054',
                'phone' => '46329544',                
                'location_id' => 1,
            ]
        );

        Contact::create(
            [

                'email' => 'lidisabel@nauta.cu',
                'mobile' => '56720711',
                'phone' => '46329544',
                'location_id' => 1,
            ]
        );
        Contact::create(
            [
                'email' => 'persona4@nauta.cu',
                'mobile' => '562558',
                'family_number' => '48687410',
                'phone' => '48230189',
                'alternate_number' => '48569863',
                'location_id' => 1
            ]
        );
        Contact::create(
            [
                'email' => 'hellen@nauta.cu',
                'mobile' => '5555555',
                'phone' => '46329544',
                'location_id' => 1,
            ]
        );

       
    }
}
