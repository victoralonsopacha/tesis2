<?php

namespace App\Imports;

use App\Models\Timbrada;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class TimbradaImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Timbrada([
            'cedula' => $row['cedula'],
            'nombre' => $row['nombre'],
            'tiempo' => $row['tiempo'],
            'fecha' => $row['fecha'],
            'estado'=> $row['estado']
        ]);
    }

    public function rules(): array
    {
        return [
            'cedula' => 'required',
            'nombre' => 'required',
            'tiempo' => 'required',
            'fecha' => 'required',
            'estado' => 'required'
        ];
    }



}
