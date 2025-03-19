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
        Schema::create('business_certifications', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('certification_id')->unsigned()->default();
            $table->foreign('certification_id')->references('id')->on('certifications')->onDelete('cascade');

            $table->integer('business_id')->unsigned()->default();///Persona de contacto del cliente, que puede ser un empleado o un representante del cliente
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            //Fecha de entrega del certificado
            $table->integer('delivery')->nullable();
            $table->boolean('is_activated')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_certifications');
    }
};
