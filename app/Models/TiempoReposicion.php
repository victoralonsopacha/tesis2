<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiempoReposicion extends Model
{
    use HasFactory;
    protected $table = "tiempo_reposicions";

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'horas',
        'fecha'

    ];

    //DESAHABILITAR ASIGNACION MASIVA
    protected $guarded = [];
}
