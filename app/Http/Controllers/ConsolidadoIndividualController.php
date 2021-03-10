<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Log;
use App\Exports\TimbradasExport;
use Maatwebsite\Excel\Facades\Excel;
class ConsolidadoIndividualController extends Controller
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
            $usersl = User::where('cedula', 'LIKE', '%'.$query.'%')->where('estado','=','1')->orderBy('id','asc')->get();
            $roles=DB::table('model_has_roles')
                ->select('role_id', 'model_id')
                ->get();
            $rolesl=DB::table('roles')
                ->where('id','=','2')
                ->select('id', 'name')
                ->get();
            return view('consolidado_individual.index', ['usersl'=>$usersl,'roles'=>$roles,'rolesl'=>$rolesl, 'buscador'=>$query]);
        }

        /*
        $usersl= User::where('cargo','=','profesor')->get();
        return view('consolidado_individual.index', compact('usersl'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('consolidado_individual.calcular',
           ['user' => $user]
        );
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


    public function consolidado_individual(User $user, Request $request){
        $ced_usuario = $user->cedula;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;

        //CONSULTA LISTAR LOS TIMBRADOS CON UN USUARIO Y ENTRE FECHAS
        $consultal = DB::select('SELECT * FROM timbradas r WHERE r.cedula =  "'.$ced_usuario.'" AND r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"');

        return view('consolidado_individual.consolidado',
        [
            'consulta' => $consultal
        ]

    );
} 


    public function exportPdf(User $user, Request $request){
        $ced_usuario = $user->cedula;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $extension = $request->formato;
        $identificador = 2;
        $consultas = DB::select('SELECT * FROM timbradas r WHERE r.cedula =  "'.$ced_usuario.'" AND r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"');
        //Log::info($consultas);
        $pdf= PDF::loadView('pdf.timbradas', compact('consultas'));
        
        if($extension == 'PDF'){
           return $pdf->download('timbradas.pdf');
        }
        if($extension == 'EXCEL'){

            return Excel::download(new TimbradasExport($ced_usuario,$fecha_inicio,$fecha_fin,$identificador), 'consolidadoIndividual.xlsx');
        }
    } 

    public function exportExcel(User $user, Request $request){
        $ced_usuario = $user->cedula;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        return Excel::download(new TimbradasExport($ced_usuario,$fecha_inicio,$fecha_fin), 'consolidadoIndividual.xlsx');
    }


}
