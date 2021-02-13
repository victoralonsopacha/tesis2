<?php

namespace App\Http\Controllers;

use App\Models\PermisoProfesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    //
    public function perfil()
    {
        return view('perfiles.profesor');
    }

    public function dashboard()
    {
        $cedula = auth()->user()->cedula;
        $permisos_aprobados=PermisoProfesor::where("estado","=",1)
            ->where("cedula","=",$cedula)
            ->get();
        $permisos_reprobados=PermisoProfesor::where("estado","=",0)
            ->where("cedula","=",$cedula)
            ->get();
        return view('dashboard.profesor',compact('permisos_aprobados','permisos_reprobados'));
    }
}
