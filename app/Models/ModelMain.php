<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ModelMain extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Asegúrate de que el nombre está presente en los atributos
            if (isset($model->name)) {
                // Obtén las primeras 2 letras del nombre en mayúsculas
                $prefix = strtoupper(substr($model->name, 0, 2));
                // Obtén el siguiente número consecutivo basado en el prefijo
                $numeroConsecutivo = $model->getNextConsecutiveNumber($prefix);

                // Asigna el valor de la clave primaria
                $model->{$model->getKeyName()} = $prefix . str_pad($numeroConsecutivo, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    private function getNextConsecutiveNumber($prefix)
    {
        // Cuenta los registros existentes que comienzan con el prefijo
        return self::where('id', 'LIKE', "$prefix%")->count() + 1; // Suponiendo que tu clave primaria es 'id'
    }


}
