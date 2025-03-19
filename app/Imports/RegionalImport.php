<?php

namespace App\Imports;

use App\Models\Regional;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class RegionalImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
      

        // Filtrar columnas vacías
        $filteredRow = array_filter($row, function ($value) {
            return !is_null($value) && $value !== '';
        });

        // Asegúrate de que aún tengas los campos requeridos
        return new Regional([
            'name' => $filteredRow['name'] ?? null,
            'code' => $filteredRow['code'] ?? null,
            'address' => $filteredRow['address'] ?? '',
            'phone' => $filteredRow['phone'] ?? '',
            'mail' => $filteredRow['mail'] ?? '',
            'activated' => $filteredRow['activated'] ? true : false,
            'country_id' => $filteredRow['country_id'] ?? null,
        ]);
    }
}
