<?php

namespace App\Http\Controllers;

use App\Models\PermisoProfesor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{
    //
    //middleware Auth
    function __construct()
    {
        $this->middleware('auth');
    }

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
        $permisos_reprobados=PermisoProfesor::where("estado","=",2)
            ->where("cedula","=",$cedula)
            ->get();
        $atrasos= DB::select('select fecha, hora_entrada, hora_salida, retraso_jornada
                from reporte_asistencia WHERE cedula = "'.$cedula.'" AND retraso_jornada != "00:00:00"');

        return view('dashboard.profesor',compact('permisos_aprobados','permisos_reprobados','atrasos'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $userRole = $user->roles->pluck('name','name')->all();
        $tipo_relacion = array(
            "Contrato" => "Contrato",
            "Temporal" => "Temporal"
        );

        return view('perfiles.profesorEdit',compact('user','userRole','tipo_relacion'));

    }

    public function update($id, Request $request)
    {

        $input = $request->all();
        $input['tipo_relacion_laboral']=implode($request['tipo_relacion']);
        if($input['password'] == ''){
            $input['password'] = Auth::user()->password;
        } else {
            $input['password'] = Hash::make($input['password']);
        }
        $user = User::find($id);
        $user->update($input);
        return redirect()->route('profile.profesor')->with('message', 'Tu informacion ha sido actualizada con exito');
    }
}
