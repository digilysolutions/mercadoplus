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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->integer('location_id')->nullable()->unsigned()->default();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->integer('inventory_manager')->nullable()->unsigned()->default(); //empleado responsable de gestionar el inventario del almacén
            $table->foreign('inventory_manager')->references('id')->on('employees')->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->boolean('is_activated')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
