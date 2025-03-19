<?php

namespace Database\Seeders;

use App\Models\PersonStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Nuevo: El cliente se ha acercado a la caja y no ha realizado ninguna transacción.
        //En espera: El cliente ha sido atendido por un empleado y está esperando para realizar una transacción.
        //Realizando compra: El cliente está realizando una transacción, es decir, está pagando o confirmando la compra.
        //Pagado: La transacción ha sido completada y el cliente ha pagado.
        //Cancelado: La transacción ha sido cancelada y no se ha realizado.
        //Anulado: La transacción ha sido anulada y no se ha realizado, pero el cliente aún puede realizar una nueva transacción.
        //Esperando pago: El cliente ha realizado una transacción, pero aún no ha pagado.
        //-------------------------------Para todos----------------------  
        // Activo: El dueño del negocio está activo y conectado al sistema, puede realizar operaciones y gestionar la tienda.
        PersonStatus::create(['name' => 'Activo',   'is_activated' =>1, 'description' => 'El dueño del negocio está activo y conectado al sistema, puede realizar operaciones y gestionar la tienda.']);

        //No disponible: El dueño del negocio no está disponible o no tiene acceso al sistema por algún motivo (por ejemplo, está en una reunión o fuera de la tienda).
        PersonStatus::create(['name' => 'No disponible',  'is_activated' =>1, 'description' => 'El dueño del negocio no está disponible o no tiene acceso al sistema por algún motivo (por ejemplo, está en una reunión o fuera de la tienda)']);


        //-------------------------------Dueño----------------------  
        //En reunión: El dueño del negocio se encuentra en una reunión o conferencia y no puede ser contactado durante ese período.   
        PersonStatus::create(['name' => 'En reunión',   'is_activated' =>1, 'description' => 'El dueño del negocio se encuentra en una reunión o conferencia y no puede ser contactado durante ese período.']);

        // Fuera de línea: El dueño del negocio se encuentra fuera de la ciudad o fuera de la zona de cobertura y no puede ser contactado a través de teléfono o email.
        PersonStatus::create(['name' => 'Fuera de línea',   'is_activated' =>1, 'description' => 'El dueño del negocio se encuentra fuera de la ciudad o fuera de la zona de cobertura y no puede ser contactado a través de teléfono o email.']);




        //-------------------------------Empleado----------------------        
        //En línea: El empleado está disponible y listo para atender a clientes y realizar transacciones.
        PersonStatus::create(['name' => 'En línea',    'is_activated' =>1, 'description' => 'El empleado está disponible y listo para atender a clientes y realizar transacciones.']);

        // En brecha: El empleado ha sido programado para trabajar en brecha, es decir, tiene una pausa programada para descansar o realizar tareas administrativas.
        PersonStatus::create(['name' => 'En brecha',   'is_activated' =>1, 'description' => 'El empleado ha sido programado para trabajar en brecha, es decir, tiene una pausa programada para descansar o realizar tareas administrativas.']);

        //Pausa: El empleado está en pausa y no puede atender a clientes durante un breve período de tiempo.
        PersonStatus::create(['name' => 'Pausa',   'is_activated' =>1, 'description' => 'El empleado está en pausa y no puede atender a clientes durante un breve período de tiempo.']);

        // Afiliado: El empleado ha sido afiliado a otra terminal o caja y no puede atender a clientes en la actual terminal.
        PersonStatus::create(['name' => 'Afiliado', 'is_activated' =>1, 'description' => 'El empleado ha sido afiliado a otra terminal o caja y no puede atender a clientes en la actual terminal.']);

        //Inactivo: El empleado no está disponible debido a problemas personales, enfermedad o vacaciones.
        PersonStatus::create(['name' => 'Inactivo',   'is_activated' =>1, 'description' => 'El empleado no está disponible debido a problemas personales, enfermedad o vacaciones.']);

        // Cerrado: El empleado ha finalizado su turno y no puede atender a clientes más.
        PersonStatus::create(['name' => 'Cerrado',   'is_activated' =>1, 'description' => 'El empleado ha finalizado su turno y no puede atender a clientes más.']);


        //-------------------------------Cliente/Customer para ver el avance del cliente----------------------        
        //Nuevo: El cliente ha llegado a la tienda por primera vez y no tiene una cuenta ni historial de compras.
        PersonStatus::create(['name' => 'Nuevo',   'is_activated' =>1, 'description' => 'El cliente ha llegado a la tienda por primera vez y no tiene una cuenta ni historial de compras.']);

        //Familiarizado: El cliente ya ha visitado la tienda antes y tiene una cuenta, pero no ha realizado compras recientes.
        PersonStatus::create(['name' => 'Familiarizado',   'is_activated' =>1, 'description' => 'El cliente ya ha visitado la tienda antes y tiene una cuenta, pero no ha realizado compras recientes.']);

        //Pendiente: El cliente tiene pedidos pendientes o reservas que aún no han sido pagados o realizados.
        PersonStatus::create(['name' => 'Pendiente',  'is_activated' =>1, 'description' => 'El cliente tiene pedidos pendientes o reservas que aún no han sido pagados o realizados.']);

        //En espera: El cliente ha sido atendido por un empleado y está esperando para realizar una transacción.
        PersonStatus::create(['name' => 'En espera',  'is_activated' =>1, 'description' => 'El cliente ha sido atendido por un empleado y está esperando para realizar una transacción.']);

        //Realizando compra: El cliente está realizando una transacción, es decir, está pagando o confirmando la compra.
        PersonStatus::create(['name' => 'Realizando compra',  'is_activated' =>1, 'description' => 'El cliente está realizando una transacción, es decir, está pagando o confirmando la compra.']);

        //Pagado: La transacción ha sido completada y el cliente ha pagado.
        PersonStatus::create(['name' => 'Pagado',  'is_activated' =>1, 'description' => 'La transacción ha sido completada y el cliente ha pagado.']);

        //Cancelado: La transacción ha sido cancelada y no se ha realizado.
        PersonStatus::create(['name' => 'Cancelado',  'is_activated' =>1, 'description' => 'La transacción ha sido cancelada y no se ha realizado.']);

        //Anulado: La transacción ha sido anulada y no se ha realizado, pero el cliente aún puede realizar una nueva transacción.
        PersonStatus::create(['name' => 'Anulado',  'is_activated' =>1, 'description' => 'La transacción ha sido anulada y no se ha realizado, pero el cliente aún puede realizar una nueva transacción.']);

        //Esperando pago: El cliente ha realizado una transacción, pero aún no ha pagado.
        PersonStatus::create(['name' => 'Esperando pago',  'is_activated' =>1, 'description' => 'El cliente ha realizado una transacción, pero aún no ha pagado.']);
    }
}
