<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

if (!function_exists('upload_image')) {
    /**
     * Sube una imagen y devuelve el path de la imagen subido.
     * Si no se proporciona ninguna imagen, devuelve la ruta de la imagen por defecto.
     *
     * @param UploadedFile|null $image
     * @return string
     * 
     */
    function upload_image(?UploadedFile $image): string
    {
        // Definir la ruta de guardado
        $path = public_path('img/upload');
        // Establece el tamaño deseado
        $desiredWidth = 400; // Ancho deseado
        $desiredHeight = 300; // Alto deseado

        // Crear el directorio si no existe
        if (!file_exists($path)) {
            mkdir($path, 0755, true); // Crear directorio img en public si no existe
        }

        // Comprobar si se proporciona una imagen
        if ($image && $image->isValid()) {

            // Generar un nombre único para la imagen
            $filename =  $image->getClientOriginalName();
            $filePath = $path . '/' . $filename;
            // Mover la imagen al director $io


            if (file_exists($filePath)) {

                // Si el archivo existe, devolver la ruta existente
                return '/img/upload/' . $filename;
            }            
            $image->move($path, $filename);

            // Devolver la ruta de la imagen subida
            return '/img/upload/' . $filename;
        }
        // Si no hay una imagen, devuelve la imagen por defecto
        return    '/img/upload/no-picture.jpg';
    }

}


