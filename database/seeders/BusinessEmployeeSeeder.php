<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Contact;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BusinessEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee1 = Employee::create(
            [
                'person_id' => 3,
                'is_activated' => true,
                'path_image'=>'/admin/images/user/01.jpg'

            ]
        );
        $employee2 = Employee::create(
            [
                'person_id' => 2,
                'is_activated' => true,
                'path_image'=>'/admin/images/user/02.jpg'

            ]
        );



        $business = Business::create(
            [
                'logo'=>'/admin/images/logo.png',
                'name' => 'Digi Solutions LY',
                'description' => 'Esto es una empresa de desarrollo de software',
                'industry' => 'Software',
                'website' => 'http://www.digilysolutions.com',
                'is_activated' => true,
                'owner_id' => 1,
                'contact_id' => 1,
                'currency_id' => 29
            ]
        );

        $business->contact()->create(
            [
                'email' => 'yrpiloto@nauta.cu',
                'mobile' => '58205054',
                'phone' => '46329544',
                'location_id' => 1
            ]
        );

        $business->employees()->attach(

            $employee1->id,[

                'is_activated'=>true,
                'hireDate'=> now(),
                'email_business'=>"yrpiloto@nauta.cu",
                'person_statuses_message'=>"Esto es una prueba ",
                'jobTitle'=>"Programador",
                'department'=>"Informatica",
                'role'=>"Crear programas, software. Ingeniero en Ciencias Informáticas",
                'salary'=> 15000


            ]
        );
        $business->employees()->attach(

            $employee2->id,[

                'is_activated'=>true,
                'hireDate'=> now(),
                'email_business'=>"lidisabel@gmail.com",
                'person_statuses_message'=>"Esto es una prueba ",
                'jobTitle'=>"Dise­adora",
                'department'=>"Diseño",
                'role'=>"Crear diseño para la empresa yu videos promocionales",
                'salary'=> 10000


            ]
        );
    }
}
