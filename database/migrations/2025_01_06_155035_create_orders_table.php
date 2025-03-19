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
        Schema::create('orders', function (Blueprint $table) {
          $table->increments('id');
            $table->string('temporary_id')->nullable(); // Para usuarios no registrados
          
              // persona que realizo la orden de compra 
            $table->integer('person_id')->nullable()->unsigned()->default();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
           
            //persona que paga la orden de compra
            $table->integer('purchase_person_id')->nullable()->unsigned()->default();
            $table->foreign('purchase_person_id')->references('id')->on('people')->onDelete('cascade');

          // ID de la persona que recibe la orden (si es diferente)          
            $table->integer('delivery_person_id')->nullable()->unsigned()->default();
            $table->foreign('delivery_person_id')->references('id')->on('people')->onDelete('cascade');
          
            $table->integer('status_id')->nullable()->nullable()->unsigned()->default();
            $table->foreign('status_id')->references('id')->on('status_orders')->onDelete('cascade');         
           
            $table->decimal('subtotal_amount', 10, 2); // Total de la orden
            $table->decimal('total_amount', 10, 2); // Total de la orden
            $table->string('currency')->default('MN'); // moneda de pago
            $table->decimal('exchange_rate')->nullable(); // Tasa de cambio (si aplica)
            $table->text('address')->nullable(); // Dirección de entrega
            $table->boolean('home_delivery')->default(false); // Si se pidió servicio a domicilio o recogida
            $table->decimal('delivery_fee', 10, 2)->nullable(); // Precio del domicilio
            $table->timestamp('purchase_date')->useCurrent(); // Fecha de compra
            $table->timestamp('delivery_date')->useCurrent()->nullable(); // Fecha de entrega
            $table->integer('delivery_time')->nullable()->default(24); // cantidad de dias u horas para la entrega
            $table->string('time_unit')->nullable()->default('Horas'); // podrá tomar los valores : Horas, Dias, meses
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
