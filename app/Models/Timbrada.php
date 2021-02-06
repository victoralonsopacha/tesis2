<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Timbrada extends Model
{
    //use HasFactories;

    protected $table = "timbradas";

    protected $fillable=[
        'cedula',
        'nombre',
        'tiempo',
        'fecha',
        'estado'
    ];

    //DESAHABILITAR ASIGNACION MASIVA
    protected $guarded = [];
}