<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimbradaPermiso;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


class TimbradaPermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query= trim($request->get('buscador'));
            $usersl = User::where('cedula', 'LIKE', '%'.$query.'%')->orderBy('id','asc')->get();
            
            return view('timbrada_permisos.index', ['usersl'=>$usersl, 'buscador'=>$query]);
        }
        
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, TimbradaPermiso $timbrada_permiso)
    {
        $fecha_hora= Carbon::now();
        $ced_usuario=$user->cedula;
        
        $consulta = DB::select('SELECT * FROM users t WHERE t.cedula LIKE  "'.$ced_usuario.'"');

        //return view('timbrada_permisos.create'); 
        
        return view('timbrada_permisos.create',[
            'consulta' => $consulta,
            'fecha_hora' => $fecha_hora
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimbradaPermiso $timbrada_permiso, Request $request)
    {
        $request->all();
        TimbradaPermiso::create($request->all());
        return redirect()->route('timbrada_permisos.index')->with('status', 'Usted ha timbrado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
