<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     //SOLO ESTOS CAMPOS SE VAN A ACTALIZAR O CREAR EN LA BASE

     protected $fillable = [
        'name',
        'last_name',
        'avatar',
        'email',
        'password',
        'cedula',
        'tipo_relacion_laboral',
        'cargo',
        'fecha_ingreso',
        'fecha_inicio',
        'fecha_fin',
         'estado'
    ];

    //DESAHABILITAR ASIGNACION MASIVA
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
