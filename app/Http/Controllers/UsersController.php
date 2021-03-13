<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\PermisoProfesor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SaveUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

//use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    //Vista Index Users
    public function index()
    {
        $roles=DB::table('model_has_roles')
            ->select('role_id', 'model_id')
            ->get();
        $rolesl=DB::table('roles')
            ->select('id', 'name')
            ->get();
        $usersl= User::get();
        return view('users.index', compact('usersl','roles','rolesl'));
    }

    //Vista Usuarios Activos
    public function activos(Request $request)
    {
        $roles=DB::table('model_has_roles')
            ->select('role_id', 'model_id')
            ->get();
        $rolesl=DB::table('roles')
            ->select('id', 'name')
            ->get();

        $usersl= User::where('estado','=','1')->get();

        return view('users.activos', ['usersl'=>$usersl,
            'roles'=>$roles,'rolesl'=>$rolesl]);

    }

    //METODO FIND
    public function find(Request $request)
    {
        $roles=DB::table('model_has_roles')
            ->select('role_id', 'model_id')
            ->get();
        $rolesl=DB::table('roles')
            ->select('id', 'name')
            ->get();

        $cedula=trim($request->input('cedula'));
        $nombre=trim($request->input('nombre'));

        if($cedula != ''){
            Log::info('cedula');
            $usersl= User::where('estado','=','1')
                ->where('cedula', 'LIKE','%'.$cedula.'%')
                ->get();
        }
        if($nombre != ''){
            Log::info('nombre');
            $usersl= User::where('estado','=','1')
                ->where('name', 'LIKE', '%'.$nombre.'%')
                ->orderBy('id','asc')
                ->get();
        }
        if($cedula != '' && $nombre != ''){
            $usersl= User::where('estado','=','1')
                ->where('name', 'LIKE', '%'.$nombre.'%')
                ->where('cedula', 'LIKE', '%'.$cedula.'%')
                ->get();
        }
        if($cedula == '' && $nombre == ''){
            Log::info('cedula y nombre');
            $usersl= User::where('estado','=','1')->get();
        }


        return view('users.find',['usersl'=>$usersl,'roles'=>$roles,'rolesl'=>$rolesl]);

    }

    //Vista Usuarios Inactivos
    public function inactivos()
    {
        $roles=DB::table('model_has_roles')
            ->select('role_id', 'model_id')
            ->get();
        $rolesl=DB::table('roles')
            ->select('id', 'name')
            ->get();
        $usersl= User::where('estado','=','0')->get();
        return view('users.inactivos', compact('usersl','roles','rolesl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_relacion_laboral = array(
            "Contrato" => "Contrato",
            "Temporal" => "Temporal",
        );
        $roles = Role::orderBy('name','asc')
            ->where('id','<','3')
            ->pluck('name','name')->all();
        return view('users.create',compact('roles','tipo_relacion_laboral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $request->validated();
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['tipo_relacion_laboral']=implode($request['tipo_relacion_laboral']);
        $input['estado']='1';
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        //return $input['estado'];
        return redirect()->route('users.activos')->with('message','El usuario ha sido creado con exito');
    }

    public function activar($id)
    {
        $user=User::find($id);
        $input['estado']='1';
        $user->update($input);
        return redirect()->route('users.activos')->with('message','El usuario ha sido activado');
    }
    public function desactivar($id)
    {
        $user=User::find($id);
        $input['estado']='0';
        $user->update($input);
        return redirect()->route('users.activos')->with('message','El usuario ha sido desactivado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
            //'user' => User::findOrFail($id)
        ]);
    }

    /**
     * LLENA LOS CAMPOS DEL FORMULARIO PARA EMPEZAR A EDITARLO.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::orderBy('name','asc')
            ->where('id','<','3')
            ->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $tipo_relacion_laboral = array(
            "Contrato" => "Contrato",
            "Temporal" => "Temporal",
        );
        return view('users.edit',compact('user','roles','userRole','tipo_relacion_laboral'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //$request->validated();
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['tipo_relacion_laboral']=implode($request['tipo_relacion_laboral']);
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.activos')->with('message', 'El usuario ha sido actualizado con exito');
    }

    public function actualizar(Request $request)
    {
        //$request->validated();
        $user=$request->all();
        $user['password']=Hash::make($request['password']);
        $user->update();
        return redirect()->route('perfiles.profesor')->with('message', 'La informacion ha sido actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('message', 'El usuario ha sido eliminado');
    }
}
