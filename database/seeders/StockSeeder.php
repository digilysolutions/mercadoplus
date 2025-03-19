<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::create([
            'warehouse_id' => null,
            'quantity_available' => 50,
            'minimum_quantity' => 5,
            'maximum_quantity' => 100,
            'taxs_rates_id' => null,
            'is_activated' => true,
            'enable_discounts_by_quantities' => false,
            'enable_discounts_by_weights' => false,
            'enable_discounts_by_expiration_dates' => false,
            'enable_discounts_by_discounts_by_important_dates' => false,
            'discounts_by_quantities_id' => null,
            'discounts_by_weights_id' => null,
            'discounts_by_expiration_dates_id' => null,
            'discounts_by_discounts_by_important_dates_id' => null,
        ]);

        Stock::create([
            'warehouse_id' => null,
            'quantity_available' => 30,
            'minimum_quantity' => 3,
            'maximum_quantity' => 80,
            'taxs_rates_id' => null,
            'is_activated' => true,
            'enable_discounts_by_quantities' => false,
            'enable_discounts_by_weights' => false,
            'enable_discounts_by_expiration_dates' => false,
            'enable_discounts_by_discounts_by_important_dates' => false,
            'discounts_by_quantities_id' => null,
            'discounts_by_weights_id' => null,
            'discounts_by_expiration_dates_id' => null,
            'discounts_by_discounts_by_important_dates_id' => null,
        ]);

        Stock::create([
            'warehouse_id' => null,
            'quantity_available' => 20,
            'minimum_quantity' => 2,
            'maximum_quantity' => 60,
            'taxs_rates_id' => null,
            'is_activated' => true,
            'enable_discounts_by_quantities' => false,
            'enable_discounts_by_weights' => false,
            'enable_discounts_by_expiration_dates' => false,
            'enable_discounts_by_discounts_by_important_dates' => false,
            'discounts_by_quantities_id' => null,
            'discounts_by_weights_id' => null,
            'discounts_by_expiration_dates_id' => null,
            'discounts_by_discounts_by_important_dates_id' => null,
        ]);
    }
}
