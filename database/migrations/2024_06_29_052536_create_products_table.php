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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('sku')->nullable();
            $table->string('description')->nullable();
            $table->string('description_small')->nullable();
            $table->string('outstanding_image')->nullable()->default(' /img/upload/no-picture.jpg'); //path or name path de la imagen destacada
            $table->string('code_currency_default')->nullable()->default('MN'); //codigo de la moneda por defecto para la tasa de cambio
            //Son atributos
            $table->date('expiration_date')->nullable();
            $table->string('expiry_period_type')->nullable(); //Este puede ser en años, meses, días, horas, minutos
            $table->integer('expiry_period')->nullable(); //cantidad: 100,20,32 ->dias, meses,años, horas
            $table->decimal('purchase_price', 10, 2)->nullable(); //precio de compra
            $table->decimal('sale_price', 10, 2)->nullable(); //precio de venta
            $table->decimal('discounted_price', 10, 2)->nullable(); //precio rebajado
            $table->dateTime('start_date_discounted_price')->nullable(); //inicio de fecha precio del producto en rebaja
            $table->dateTime('end_date_discounted_price')->nullable(); //fecha precio del producto en rebaja
            $table->boolean('enable_delivery')->nullable()->default(true);
            $table->boolean('enable_reservation')->nullable()->default(false);

            $table->integer('views')->default(0); // Columna para contar vistas
            $table->integer('sales')->default(0); // Columna para contar ventas


            $table->decimal('weight')->nullable(); // dimensiones del producto
            $table->decimal('height')->nullable(); // dimensiones del producto
            $table->decimal('width')->nullable(); // dimensiones del producto
            $table->decimal('length')->nullable(); // dimensiones del producto
            $table->boolean('enable_stock')->nullable()->default(true); //si el producto se encuentra almacenado /control de inventario
            $table->boolean('enable_variations')->nullable()->default(false); //variaciones
            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('model_id')->unsigned()->nullable();
            $table->foreign('model_id')->references('id')->on('model_products')->onDelete('cascade');
            $table->integer('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

            $table->boolean('is_activated')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
