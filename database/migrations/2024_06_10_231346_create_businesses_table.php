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
        Schema::create('businesses', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();  //Descripción breve del negocio
            $table->string('industry')->nullable();  //Industria o sector al que pertenece el negocio
            $table->string('website')->nullable();    //Sitio web oficial del negocio
            $table->boolean('is_activated')->nullable()->default(true);
            $table->string('logo')->nullable()->default('/admin/images/upload/no-picture.jpg'); //path or name path del logo

            $table->integer('currency_id')->unsigned()->nullable()->default();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->integer('contact_id')->unsigned()->nullable()->default();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->integer('owner_id')->unsigned()->nullable()->default  ();
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
