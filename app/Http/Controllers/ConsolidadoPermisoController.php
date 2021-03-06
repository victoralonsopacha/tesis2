<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Log;
use App\Exports\TimbradasExport;
use Maatwebsite\Excel\Facades\Excel;
class ConsolidadoPermisoController extends Controller
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
        if($request){
            $cedula= trim($request->get('cedula'));
            $nombre=trim($request->input('nombre'));

            $roles=DB::table('model_has_roles')
                ->select('role_id', 'model_id')
                ->get();
            $rolesl=DB::table('roles')
                ->where('id','=','2')
                ->select('id', 'name')
                ->get();
            if($cedula != ''){
                $usersl= User::where('estado','=','1')
                    ->where('cedula', 'LIKE','%'.$cedula.'%')
                    ->orderBy('id','asc')
                    ->get();
            }
            if($nombre != ''){
                $usersl= User::where('estado','=','1')
                    ->where('name', 'LIKE', '%'.$nombre.'%')
                    ->orderBy('id','asc')
                    ->get();
            }
            if($cedula != '' && $nombre != ''){
                $usersl= User::where('estado','=','1')
                    ->where('name', 'LIKE', '%'.$nombre.'%')
                    ->where('cedula', 'LIKE', '%'.$cedula.'%')
                    ->orderBy('id','asc')
                    ->get();
            }
            if($cedula == '' && $nombre == ''){
                $usersl = User::where('name', 'LIKE', '%'.$nombre.'%')
                    ->where('estado','=','1')
                    ->orderBy('id','asc')
                    ->get();
            }
            return view('consolidado_permisos.index', ['usersl'=>$usersl,'roles'=>$roles,'rolesl'=>$rolesl]);
        }
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
        return view('consolidado_permisos.calcular',
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
        $consultal = DB::select('SELECT * FROM timbrada_permisos r WHERE r.cedula =  "'.$ced_usuario.'" AND r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"');

        return view('consolidado_permisos.consolidado',
        [
            'consulta' => $consultal
        ]

        );
    }


    public function exportPdf2(User $user, Request $request){
        $ced_usuario = $user->cedula;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $extension = $request->formato;
        $identificador = 1;
        $consultas = DB::select('SELECT * FROM timbrada_permisos r WHERE r.cedula =  "'.$ced_usuario.'" AND r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"');
        $usuario = DB::select('SELECT * FROM users WHERE cedula = "'.$ced_usuario.'"');

        $pdf= PDF::loadView('pdf.timbradas_permisos', compact('consultas','usuario'));

        if(empty($consultas)){
            return redirect()->back()->with('error', 'No existen registros');
        }

        if($extension == 'PDF'){
            return $pdf->download('permisospdf.pdf');
         }
         if($extension == 'EXCEL'){

             return Excel::download(new TimbradasExport($ced_usuario,$fecha_inicio,$fecha_fin,$identificador), 'permisosexcel.xlsx');
         }


    }
}
