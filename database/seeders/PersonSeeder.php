<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $person1 = Person::create(
            [
                'first_name' => "Yasniel",
                'middle_name' => '',
                'last_name' => "Reyes Piloto",
                'gender' => 'Masculino',
                'marital_status' => 'Casado',
                'blood_group' => 'A+',
                'language' => 'es',
                'contact_id' => 1,
                'person_statuses_id' => 1,
                'is_activated' => 1,
                'user_id'=>1
            ]
        );
        $person2 = Person::create(
            [
                'first_name' => "Lidisabel",
                'last_name' => "Perez Gonzaez",
                'gender' => 'Femenino',
                'marital_status' => 'Casado',
                'blood_group' => 'A+',
                'language' => 'es',
                'contact_id' => 2,
                'person_statuses_id' => 1,
                'is_activated' => 1,
                'user_id'=>3
            ]
        );
        $person3 = Person::create(
            [
                'first_name' => "Hellen",
                'last_name' => "Reyes Perez",
                'gender' => 'Femenino',
                'marital_status' => '',
                'blood_group' => 'O+',
                'language' => 'es',
                'contact_id' => 4,
                'person_statuses_id' => 2,
                'is_activated' => 1,
                'user_id'=>2
            ]
        );

        $person3->customer()->create(
            [
                'person_statuses_message' => 'estoy activo pero es una prueba',
                'billingAddress_id' => 1,
                'shippingAddress_id' => 1,
                'creditCardNumber' => 254582456,
                'creditCardExpirationDate' => now(),
                'creditLimit' => true,

            ]
        );

        $person1->owner()->create(
            ['is_activated' => true, 'person_statuses_message' => 'estoy activo pero es una prueba']
        );




    }
}
