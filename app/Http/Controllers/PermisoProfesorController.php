<?php

namespace App\Http\Controllers;

use App\Models\PermisoProfesor;

use Illuminate\Http\Request;

use App\Http\Requests\SavePermisoProfesorRequest;
use Illuminate\Support\Facades\DB;

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
        $permisosl= PermisoProfesor::where('cedula','=',$cedula)
            ->where('estado','=',1)
            ->get();
        return view('permiso_profesors.index',compact('permisosl'));
    }
    public function index1(Request $request)
    {

        $cedula = auth()->user()->cedula;
        $permisosl= PermisoProfesor::where('cedula','=',$cedula)
            ->where('estado','=',0)
            ->get();
        return view('permiso_profesors.index1',compact('permisosl'));
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
        return view('permiso_profesors.create',
            ['permiso_profesor' => new PermisoProfesor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePermisoProfesorRequest $request)
    {

        $request->validated();
        $entrada=$request->all();
        if($archivo=$request->file('file')){
            $nombre_imagen=$archivo->getClientOriginalName();
            $archivo->move('public',$nombre_imagen);
            $entrada['file']=$nombre_imagen;
        }

        PermisoProfesor::create($entrada);

        return redirect()->route('permiso_profesors.shows',$request->cedula)->with('message', 'El permiso fue creado con exito');

        //PermisoProfesor::create($request->validated());
        //return redirect()->route('permiso_profesors.index')->with('status', 'El permiso fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PermisoProfesor $permiso_profesor)
    {
        return view('permiso_profesors.show', [
            'permiso_profesor' => $permiso_profesor
            //'user' => User::findOrFail($id)
        ]);
    }
    public function shows(PermisoProfesor $permiso_profesor)
    {
        $cedula = auth()->user()->cedula;
        $permisos=PermisoProfesor::where('cedula','=',$cedula)
            ->get();
        return view('permiso_profesors.shows', compact('permisos'));
    }
    public function buscar(Request $request)
    {
        $cedula = auth()->user()->cedula;
        $fecha_inicio=$request->input('fecha_inicio');
        $fecha_fin=$request->input('fecha_fin');
        $permisos=PermisoProfesor::where('cedula','=', $cedula)
            ->whereBetween('fecha_inicio', [$fecha_inicio, $fecha_fin])
            ->get();
        return view('permiso_profesors.shows', compact('permisos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PermisoProfesor $permiso_profesor)
    {
        return view('permiso_profesors.edit',
            ['permiso_profesor' => $permiso_profesor ]);
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
        if($archivo=$request->file('file')){
            $nombre_imagen=$archivo->getClientOriginalName();
            $archivo->move('public',$nombre_imagen);
            $entrada['file']=$nombre_imagen;
        }
        //VALIDACION PEDIENTE DEBIDO A QUE ES NECESARIO GUARDAR LA IMAGEN
        $permiso_profesor->update($entrada);

        return redirect()->route('permiso_profesors.show', $permiso_profesor)->with('status', 'El permiso ha sido actualizado con exito');


        //$permiso_profesor->update( $request->validated() );

        //return redirect()->route('permiso_profesors.show', $permiso_profesor)->with('status', 'El permiso ha sido actualizado con exito');

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

        return redirect()->route('permiso_profesors.index')->with('status', 'El permiso ha sido eliminado');

    }
}
