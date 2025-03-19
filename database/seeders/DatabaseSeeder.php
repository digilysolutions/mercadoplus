<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\MembershipFeature;
use App\Models\Person;
use App\Models\Student;
use App\Models\StudyCenter;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();
        $roles = [
            'Administrador',
            'Usuario',
            'Gestor Comercial'
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'Administrador',
            'password' => '1234',
            'roleid' => 1
        ]);
        $contact =  Contact::create([
            'phone' => '58205054',
        ]);


        $user= User::factory()->create([
            'name' => 'usuario',
            'email' => 'usuario@gmail.com',
            'role' => 'Usuario',
            'password' => '1234',
            'roleid' => 2
        ]);
        User::factory()->create([
            'name' => 'gestor',
            'email' => 'gestor@gmail.com',
            'role' => 'Gestor Comercial',
            'password' => '1234',
            'roleid' => 3
        ]);
        $this->call(CountrySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(PersonStatusSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(BusinessEmployeeSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(UnitBaseSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(CountryCurrencySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ModelProductSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(AttributesSeeder::class);
        $this->call(TermsSeeder::class);
        $this->call(DeliveryZoneSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(StatusOrderSeeder::class);
    }
}
