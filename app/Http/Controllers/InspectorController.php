<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InspectorController extends Controller
{
    //middleware Auth
    function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function profile()
    {
        return view('perfiles.inspector');
    }

    public function dashboard()
    {
        return view('dashboard.inspector');
    }
    //METODO EDITAR Y ACTUALIZAR DEL PERFIL DE INSPECTOR
    public function edit($id)
    {
        $user = User::find($id);
        $userRole = $user->roles->pluck('name','name')->all();
        $tipo_relacion = array(
            "Contrato" => "Contrato",
            "Temporal" => "Temporal"
        );
        return view('perfiles.inspectorEdit',compact('user','userRole','tipo_relacion'));

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

        return redirect()->route('profile.inspector')->with('message', 'Tu informacion ha sido actualizada con exito');

    }
}
