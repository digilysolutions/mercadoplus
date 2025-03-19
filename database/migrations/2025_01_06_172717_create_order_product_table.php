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
        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_id')->nullable()->unsigned()->default();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');


            $table->integer('person_id')->nullable()->unsigned()->default();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');

            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->decimal('subtotal_price', 10, 2);
            $table->decimal('price_discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
