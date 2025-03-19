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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('person_id')->unsigned()->default();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
           
           
            $table->string('person_statuses_message', 150)->nullable();
         
            $table->integer('billingAddress_id')->unsigned()->nullable()->default(); //Dirección para facturación del cliente
            $table->foreign('billingAddress_id')->references('id')->on('locations')->onDelete('cascade');
            
            $table->integer('shippingAddress_id')->unsigned()->nullable()->default(); //Dirección para envío o entrega del producto
            $table->foreign('shippingAddress_id')->references('id')->on('locations')->onDelete('cascade');

            $table->integer('creditCardNumber')->nullable(); //Número de la tarjeta de crédito, en caso de ser necesari
           
            $table->date('creditCardExpirationDate')->nullable(); //Fecha de vencimiento de la tarjeta de crédito, en caso de ser necesario
            $table->double('creditLimit')->nullable(); //Límite de crédito del cliente
            $table->boolean('is_activated')->nullable()->default(true);
            //paymentMethod_id //Método de pago predeterminado del cliente, como tarjeta de crédito, débito en cuenta bancaria, etc.

            /*  $table->integer('total_rp')->default(0); //rp is the short  form  of reward points //Puntos de recompensa
            $table->integer('total_rp_used')->default(0); //rp is the short  form  of reward points //Puntos de recompensa
            $table->date('date_expired_total_points')->nullable(); //rp is the short  form  of reward points

           */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
