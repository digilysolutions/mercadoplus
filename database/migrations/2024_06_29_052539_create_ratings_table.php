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
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rating')->default(1)->min(1)->max(5); //un entero entre 1 y 5 que representa la calificación dada por el usuario

           
            //Si e producto es nulo,la reseña fue al negocio

            $table->integer('product_id')->unsigned()->default();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');


            $table->date('date');//una fecha que representa la fecha en que se publicó la reseña

            $table->integer('writer_id')->unsigned()->default();//una referencia a la clase User que representa al usuario que escribió la reseña (atributo privado)
            $table->foreign('writer_id')->references('id')->on('people')->onDelete('cascade');
            $table->boolean('is_activated')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
