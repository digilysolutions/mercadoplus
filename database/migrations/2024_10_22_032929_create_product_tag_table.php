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
        Schema::create('product_tag', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned(); //id del producto
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            $table->integer('tag_id')->unsigned(); //id de la moneda
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->boolean('is_activated')->nullable()->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_tags');
    }
};
