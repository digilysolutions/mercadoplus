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
        Schema::create('products_variations', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_activated')->nullable()->default(true);
            
            $table->integer('variation_id')->unsigned()->default();
            $table->foreign('variation_id')->references('id')->on('variations')->onDelete('cascade');
           
            $table->integer('variations_term_id')->unsigned()->default();
            $table->foreign('variations_term_id')->references('id')->on('terms')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_variations');
    }
};
