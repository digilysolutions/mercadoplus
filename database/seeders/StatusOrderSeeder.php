<?php

namespace Database\Seeders;

use App\Models\StatusOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        StatusOrder::create([
            'status' => "Pendiente",
            'description' => "Este es el estado inicial después de que una orden es creada. La orden ha sido recibida, pero aún no se ha procesado.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "Procesando",
            'description' => "La orden se está procesando. Se pueden verificar los detalles del pedido, verificar la disponibilidad de stock, almacenar el pedido en el sistema o realizar otras operaciones necesarias para la preparación de la orden.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "Pago Aceptado",
            'description' => "Se ha confirmado que el pago ha sido recibido y aceptado. En este punto, se puede proceder a preparar el envío.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "Listo para Enviar",
            'description' => "La orden está lista para ser enviada. Esto puede incluir empaquetar el producto y generarse una etiqueta de envío.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "Enviado",
            'description' => "La orden ha sido enviada. A menudo, se genera un número de seguimiento en este estado.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "En Entrega",
            'description' => "La orden está en camino hacia la dirección del cliente. Este estado generalmente se utiliza en la fase final de entrega.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "Completada",
            'description' => "La orden ha sido entregada con éxito al cliente y se considera completa. En este estado, es común ofrecer opciones para dejar una reseña o devolver el producto.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "Cancelada",
            'description' => "La orden ha sido cancelada antes de ser procesada o enviada. Puede ser cancelada por el cliente o por el administrador del sistema.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "Reembolsado",
            'description' => "La orden ha sido reembolsada total o parcialmente. Esto sucedería después de que un cliente inicie una devolución o el comercio decida reembolsar al cliente por algún motivo.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "Fallida",
            'description' => "Un estado que indica que hubo un problema en el proceso de pago, lo que impidió que la orden fuera aceptada.",
            'is_activated' => true,
        ]);
        StatusOrder::create([
            'status' => "En Espera",
            'description' => "Se puede usar este estado si la orden está detenida por alguna razón, como problemas de stock, revisiones de seguridad o problemas de pago que necesitan resolverse antes de continuar.",
            'is_activated' => true,
        ]);
    }
}
