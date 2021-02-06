<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimbradaPermiso extends Model
{
    use HasFactory;

    protected $table = "timbrada_permisos";

    protected $fillable = [
        'cedula',
        'fecha',
        'hora',
        'tipo_permiso',
        'observacion'

    ];

    //DESAHABILITAR ASIGNACION MASIVA
    protected $guarded = [];
}
