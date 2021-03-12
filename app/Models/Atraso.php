<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atraso extends Model
{
    use HasFactory;

    protected $table = "tiempo_reposicions";

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'horas',
        'fecha',
        'estado'
    ];

    protected $guarded = [];
}
