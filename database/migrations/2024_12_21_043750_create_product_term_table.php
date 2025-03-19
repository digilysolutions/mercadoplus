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
        Schema::create('product_term', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned(); //id del producto
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('term_id')->unsigned()->default();
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_term');
    }
};
