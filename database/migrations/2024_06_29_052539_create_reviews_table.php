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
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('business_id')->unsigned()->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');

            //Si e producto es nulo,la reseña fue al negocio

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->string('comment'); //un string que representa el comentario o feedback del usuario
            $table->date('date')->nullable()->default(now());//una fecha que representa la fecha en que se publicó la reseña

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
        Schema::dropIfExists('reviews');
    }
};
