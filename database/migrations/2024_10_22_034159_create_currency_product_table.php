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
        Schema::create('currency_product', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned(); //id del producto
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('currency_id')->unsigned(); //id de la moneda
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->boolean('is_activated')->nullable()->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_product');
    }
};
