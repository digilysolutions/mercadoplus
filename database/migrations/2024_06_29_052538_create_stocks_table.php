<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('warehouse_id')->nullable()->unsigned();
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->decimal('quantity_available', 10, 0)->nullable(); // <--- Aquí se define el campo quantity_available con un decimal con 10 dígitos y cero decimales
            $table->decimal('minimum_quantity', 10, 0)->nullable();; // <--- Aquí se define el campo minimum_quantity con un decimal con 10 dígitos y cero decimales
            $table->decimal('maximum_quantity', 10, 0)->nullable(); // <--- Aquí se define el campo maximum_quantity con un decimal con 10 dígitos y cero decimales


            $table->integer('product_id')->nullable()->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');


            $table->integer('taxs_rates_id')->unsigned()->nullable();
            $table->foreign('taxs_rates_id')->references('id')->on('taxs_rates')->onDelete('cascade');




            $table->boolean('is_activated')->nullable()->default(true);


            $table->boolean('enable_discounts_by_quantities')->nullable()->default(false);//Se activa para decirle que elproducto tiene descuento por cantidad
            $table->boolean('enable_discounts_by_weights')->nullable()->default(false);//Se activa para decirle que el producto tiene descuento por peso ejemplo > 1T
            $table->boolean('enable_discounts_by_expiration_dates')->nullable()->default(false);//Se activa para decirle que el producto tiene descuento fecha de vencimiento
            $table->boolean('enable_discounts_by_discounts_by_important_dates')->nullable()->default(false);//Se activa para decirle que el producto tiene descuento por fechas importantes

            $table->integer('discounts_by_quantities_id')->unsigned()->nullable();
            $table->foreign('discounts_by_quantities_id')->references('id')->on('discounts_by_quantities')->onDelete('cascade');

            $table->integer('discounts_by_weights_id')->unsigned()->nullable();
            $table->foreign('discounts_by_weights_id')->references('id')->on('discounts_by_weights')->onDelete('cascade');

            $table->integer('discounts_by_expiration_dates_id')->unsigned()->nullable();
            $table->foreign('discounts_by_expiration_dates_id')->references('id')->on('discounts_by_expiration_dates')->onDelete('cascade');

            $table->integer('discounts_by_discounts_by_important_dates_id')->unsigned()->nullable();
            $table->foreign('discounts_by_discounts_by_important_dates_id')->references('id')->on('discounts_by_important_dates')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
