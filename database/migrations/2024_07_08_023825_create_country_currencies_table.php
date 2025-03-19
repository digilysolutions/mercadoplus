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
        Schema::create('country_currencies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('currency_id')->unsigned(); //Moneda
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');

            $table->integer('country_id')->unsigned(); //Pais de donde es la moneda
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->double('exchange_rate')->nullable()->default(0);//Tasa de cambio
            $table->boolean('code_currency_default')->nullable()->default(false); //codigo de la moneda por defecto para la tasa de cambio
            $table->boolean('is_activated')->nullable()->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_currencies');
    }
};
