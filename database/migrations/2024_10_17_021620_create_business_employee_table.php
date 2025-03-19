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
        Schema::create('business_employee', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('is_activated')->nullable()->default(true);

            $table->integer('employee_id')->unsigned()->default();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->integer('business_id')->unsigned()->default();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');

            $table->datetime('hireDate')->nullable();  //Fecha de contratación del empleado
            $table->string('email_business')->nullable(); //Correo electrónico del empleado
            //El estado del dueño que puede i cambiando, en liena, no molestar, activo
            $table->integer('person_statuses_id')->nullable();

            //mensaje que el dueño desee poner segun el estado que escoge o puede poner una frase
            $table->string('person_statuses_message', 150)->nullable();
            $table->string('jobTitle')->nullable(); //Título del trabajo o puesto del empleado
            $table->string('department')->nullable();  //Departamento o área en la que trabaja el empleado
            $table->string('role')->nullable();  //Papel o función que desempeña el empleado en la empresa
            $table->double('salary')->nullable();  //Salario o sueldo del empleado


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_employee');
    }
};
