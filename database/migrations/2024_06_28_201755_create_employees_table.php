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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path_image')->nullable();
            $table->integer('person_id')->unsigned()->default();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
           
            //mensaje que el dueño desee poner segun el estado que escoge o puede poner una frase
            $table->string('person_statuses_message', 150)->nullable();
            $table->boolean('is_activated')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
