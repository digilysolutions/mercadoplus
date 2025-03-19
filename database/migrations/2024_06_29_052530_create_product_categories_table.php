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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique(); //Nombre de la categoria del producto(Carne, Cerales, Bebida)
            $table->string('short_code')->nullable(); //Nombre corto de la categoria
            $table->string('description')->nullable(); //Descripcion de la categoria
            $table->integer('category_parent')->nullable()->default(0); //la raiz de u producto o el padre
            $table->string('path_image')->nullable()->default(' /img/upload/no-picture.jpg'); //path or name path de la imagen destacada
            $table->boolean('is_activated')->nullable()->default(true); //Si la categoria esta activa o no

            $table->json('exchange_rates');
            $table->string('code_currency_default')->nullable()->default('MN'); //codigo de la moneda por defecto para la tasa de cambio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
