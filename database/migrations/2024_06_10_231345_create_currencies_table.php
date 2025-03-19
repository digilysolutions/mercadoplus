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
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('currency');
            $table->string('country'); //Nombre de la moneda Ej: Leke,Dollars,Euro, etc
            
            $table->boolean('is_activated')->nullable()->default(true);           
            $table->string('path_flag')->nullable();    
            $table->char('code',3); // nombre corto de la moneda (EUR, USD, MN, MLC, )
            $table->char('symbol',4); // simbolo de la moneda $, €, ¥, $b,....
            $table->char('thousand_separator',1); //separador  (,)
            $table->char('decimal_separator',1); //separador  (.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
