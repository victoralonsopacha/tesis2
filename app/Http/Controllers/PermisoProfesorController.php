<?php

namespace App\Http\Controllers;


use App\Http\Requests\SearchPermisoProfesorRequest;
use App\Http\Requests\SearchTimeRequest;
use App\Models\PermisoProfesor;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests\SavePermisoProfesorRequest;
use App\Http\Requests\CreatePermisoProfesorRequest;
use Illuminate\Support\Facades\DB;
use App\Events\PermisoEvent;
use App\Notifications\PermisosNotification;



class PermisoProfesorController extends Controller
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

    public function index(Request $request)
    {
        $cedula = auth()->user()->cedula;
        $permisos= PermisoProfesor::where('cedula','=',$cedula)
            ->where('estado','=','1')
            ->get();
        return view('permiso_profesors.index',compact('permisos'));
    }
    public function index1(Request $request)
    {
        $cedula = auth()->user()->cedula;
        $permisos= PermisoProfesor::where('cedula','=',$cedula)
            ->where('estado','=','2')
            ->get();
        return view('permiso_profesors.index1',compact('permisos'));
    }

    public function inicio(){
        $permisosl= PermisoProfesor::get();
        return view('permiso_profesors.principal',compact('permisosl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_permiso = array(
            "Medico" => "Medico",
            "Calamidad Domestrica" => "Calamidad Domestrica",
            "Otro" => "Otro",
        );

        $cedula=auth()->user()->cedula;
        $usuario=DB::select('SELECT u.cedula, u.name, u.last_name FROM users u WHERE u.cedula = "'.$cedula.'"');
        return view('permiso_profesors.create',
            ['permiso_profesor' => new PermisoProfesor,'tipo_permiso'=>$tipo_permiso, 'usuario'=>$usuario]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermisoProfesorRequest $request)
    {
        $request->validated();
        $permiso=$request->all();
        $permiso['cedula']=auth()->user()->cedula;
        $permiso['name'];
        $permiso['last_name'];
        $permiso['tipo_permiso']=implode($request['tipo_permiso']);
        $permiso['estado']='0';

        if($archivo=$request->file('file')){
            $nombre_imagen=$archivo->getClientOriginalName();
            $archivo->move(public_path("img/categorias/"),$nombre_imagen);
            $permiso['file']=$nombre_imagen;
            //obtenemos el campo file definido en el formulario

            //obtenemos el nombre del archivo
            $nombre = $archivo->getClientOriginalName();
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre,  \File::get($archivo));
        }
        PermisoProfesor::create($permiso);
        return redirect()->route('permiso_profesors.shows',$request->cedula)->with('message', 'El permiso fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(PermisoProfesor $permiso_profesor)
    {
        $tipo_permiso = array(
            "Medico" => "Medico",
            "Calamidad Domestrica" => "Calamidad Domestrica",
            "Otro" => "Otro",
        );
        return view('permiso_profesors.show',
            ['permiso_profesor' => $permiso_profesor,'tipo_permiso'=>$tipo_permiso]);
    }

    public function shows(PermisoProfesor $permiso_profesor)
    {
        $cedula = auth()->user()->cedula;
        $permisos=PermisoProfesor::where('cedula','=',$cedula)
            ->orderBy('fecha_inicio','desc')
            ->get();
        return view('permiso_profesors.shows', compact('permisos'));
    }

    public function buscar(SearchTimeRequest $request)
    {
        $request->validated();
        $cedula = auth()->user()->cedula;
        $fecha_inicio=$request->input('fecha_inicio');
        $fecha_fin=$request->input('fecha_fin');

        $permisos=PermisoProfesor::where('cedula','=', $cedula)
            ->whereBetween('fecha_inicio', [$fecha_inicio, $fecha_fin])
            ->orderBy('fecha_inicio','desc')
            ->get();

        return view('permiso_profesors.shows', compact('permisos'));
    }


    public function buscarA(SearchPermisoProfesorRequest $request)
    {
        $request->validated();
        $cedula = auth()->user()->cedula;
        $fecha_inicio=$request->input('fecha_inicio');
        $fecha_fin=$request->input('fecha_fin');

        $permisos=PermisoProfesor::where('cedula','=', $cedula)
            ->where('estado','=','1')
            ->whereBetween('fecha_inicio', [$fecha_inicio, $fecha_fin])
            ->get();
        return view('permiso_profesors.index',compact('permisos'));
    }

    public function buscarB(SearchPermisoProfesorRequest $request)
    {
        $request->validated();
        $cedula = auth()->user()->cedula;
        $fecha_inicio=$request->input('fecha_inicio');
        $fecha_fin=$request->input('fecha_fin');

        $permisos=PermisoProfesor::where('cedula','=', $cedula)
            ->where('estado','=','1')
            ->whereBetween('fecha_inicio', [$fecha_inicio, $fecha_fin])
            ->get();
        return view('permiso_profesors.index1',compact('permisos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PermisoProfesor $permiso_profesor)
    {
        $tipo_permiso = array(
            "Medico" => "Medico",
            "Calamidad Domestrica" => "Calamidad Domestrica",
            "Otro" => "Otro",
        );
        return view('permiso_profesors.edit',
            ['permiso_profesor' => $permiso_profesor,'tipo_permiso'=>$tipo_permiso]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermisoProfesor $permiso_profesor, SavePermisoProfesorRequest $request)
    {
        $request->validated();
        $entrada=$request->all();
        $entrada['tipo_permiso']=implode($request['tipo_permiso']);
        if($archivo=$request->file('file')){
            $nombre_imagen=$archivo->getClientOriginalName();
            $archivo->move('public',$nombre_imagen);
            $entrada['file']=$nombre_imagen;
        }
        //VALIDACION PENDIENTE DEBIDO A QUE ES NECESARIO GUARDAR LA IMAGEN
        $permiso_profesor->update($entrada);


        return view('permiso_profesors.show',
            ['permiso_profesor' => $permiso_profesor]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermisoProfesor $permiso_profesor)
    {
        $permiso_profesor->delete();

        return redirect()->route('permiso_profesors.shows')->with('message', 'El permiso ha sido eliminado');

    }
}
