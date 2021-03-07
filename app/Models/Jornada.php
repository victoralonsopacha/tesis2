<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    use HasFactory;
    protected $table = 'reporte_asistencia';
    protected $fillable = [
        'id_reporte',
        'cedula',
        'apellido',
        'nombre',
        'anio',
        'mes_nombre',
        'dia',
        'fecha',
        'hora_entrada',
        'hora_salida',
        'tiempo_total'

    ];

}
