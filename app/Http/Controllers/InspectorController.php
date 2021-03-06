<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InspectorController extends Controller
{
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
        $input['password'] = Hash::make($input['password']);
        $user = User::find($id);

        $updated=$user->update($input);
        if($updated){
            return redirect()->route('profile.inspector',compact('user'))->with('message', 'Tu informacion ha sido actualizada con exito');
        }else{
            return redirect()->route('profile.inspector',compact('user'))->with('message', 'Could not update');
        }
    }
}
