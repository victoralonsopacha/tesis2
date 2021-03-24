<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\PermisoProfesor;
use Illuminate\Http\Request;

use App\Http\Requests\SavePermisoRequet;
use Illuminate\Support\Facades\Storage;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //middleware Auth
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $estado = array(
            "" => "Estado:",
            "0" => "Pendiente",
            "1" => "Aprobado",
            "2" => "Reprobado",
        );
        $permisosl=PermisoProfesor::orderBy('id','desc')->paginate(10);
        $users=User::get();
        return view('permisos.index',
            ['permisosl'=>$permisosl,'users'=>$users,'estado'=>$estado]);
    }

    //METODO FIND
    public function findRequest(Request $request)
    {
        $estado = array(
            "" => "Estado:",
            "0" => "Pendiente",
            "1" => "Aprobado",
            "2" => "Reprobado",
        );
        $users=User::get();

        $cedula=trim($request->input('buscador'));
        $state=implode($request->input('estado'));
        if($cedula != ''){
            $permisosl = PermisoProfesor::where('cedula', 'LIKE', $cedula)->orderBy('id','desc')->paginate(10);
        }
        if($state != ''){
            $permisosl = PermisoProfesor::where('estado', '=', $state)->orderBy('id','desc')->paginate(10);
        }
        if($cedula != '' && $state != ''){
            $permisosl = PermisoProfesor::where('estado', '=', $state)
                ->where('cedula', 'LIKE', $cedula)
                ->orderBy('id','desc')->paginate(10);
        }
        if($cedula == '' && $state == ''){
            $permisosl=PermisoProfesor::orderBy('id','desc')->paginate(10);
        }
        return view('permisos.index', ['permisosl'=>$permisosl,'users'=>$users,'estado'=>$estado]);
    }


/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        return view('permisos.create',
            ['permiso' => new PermisoProfesor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePermisoRequet $request)
    {
        $request->validated();
        $entrada=$request->all();
        if($archivo=$request->file('file')){
            $nombre_imagen=$archivo->getClientOriginalName();
            $archivo->move('public',$nombre_imagen);
            $entrada['file']=$nombre_imagen;
        }
        PermisoProfesor::create($entrada);
        return redirect()->route('permisos.index',$request->cedula)->with('status', 'El permiso fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PermisoProfesor $permiso)
    {
        return view('permisos.show', [
            'permiso' => $permiso
            //'user' => User::findOrFail($id)
        ]);
    }


    public function edit(PermisoProfesor $permiso)
    {
        return view('permisos.edit',
            ['permiso' => $permiso ]);
    }

    public function justificar(PermisoProfesor $permiso)
    {
        $estado = array(
            "1" => "Aprobado",
            "2" => "Reprobado",
        );
        $cedula=$permiso->cedula;
        $usuario=User::where('cedula','=',$cedula)->get();

        return view('permisos.justificar',
            compact('estado','usuario','permiso'));
    }

    public function downloadFile(){


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermisoProfesor $permiso, Request $request)
    {
        $permiso->fecha_inicio=$request->fecha_inicio;
        $permiso->hora_inicio=$request->hora_inicio;
        $permiso->fecha_fin=$request->fecha_fin;
        $permiso->hora_fin=$request->hora_fin;
        $permiso->tipo_permiso=$request->tipo_permiso;
        $permiso->fecha_fin=$request->fecha_fin;
        $permiso->file=$request->file;
        $permiso->estado=implode($request->input('estado'));
        $permiso->desaprobacion=$request->desaprobacion;
        $permiso->save();
        return redirect()->route('permisos.index', $permiso)->with('message', 'El permiso ha sido actualizado con exito');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermisoProfesor $permiso)
    {
        $permiso->delete();

        return redirect()->route('permisos.index')->with('status', 'El permiso ha sido eliminado');

    }
}
