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
        Schema::create('discounts_by_important_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_activated')->nullable()->default(true);
            $table->string('discount_type')->default('');//Tipo de descuento si es por porciento o fijo, cantidad de dinero
            $table->decimal("discount_amount", 10, 2); //cantidad de descuetno

            $table->date("start_date"); //Fecha de incio para el descuento
            $table->date("end_date");//Fecha final para el descuento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts_by_important_dates');
    }
};
