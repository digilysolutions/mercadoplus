<?php

namespace Database\Seeders;

use App\Models\CountryCurrency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CountryCurrency::create([
            'country_id' => 1,
            'currency_id' => 29,
            'exchange_rate' => 1,
            'code_currency_default'=>true
        ]);
        CountryCurrency::create([
            'country_id' => 1,
            'currency_id' => 30,
            'exchange_rate' => 275,
            'code_currency_default'=>false
        ]);
        CountryCurrency::create([
            'country_id' => 1,
            'currency_id' => 2,
            'exchange_rate' => 330,
            'code_currency_default'=>false
        ]);
    }
}
