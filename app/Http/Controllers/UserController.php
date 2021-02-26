<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $tipo_relacion = array(
            "Contrato" => "Contrato",
            "Temporal" => "Temporal"
        );
        return view('perfiles.profesor_edit',compact('user','roles','userRole','tipo_relacion'));

    }

    public function update($id, Request $request)
    {
        //$input=$request->validated();
        $input = $request->all();
        $input['tipo_relacion_laboral']=implode($request['tipo_relacion']);
        $input['password'] = Hash::make($input['password']);
        $user = User::find($id);

        $user->update($input);
        return redirect()->route('perfil.profesor',compact('user'))->with('message', 'Tu informacion ha sido actualizada con exito');
    }
}
