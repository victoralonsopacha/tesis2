<?php

namespace App\Http\Controllers;
use App\Http\Requests\SearchTimeRequest;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class ControlTiempoController extends Controller
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
        if($request){
            $cedula=trim($request->input('cedula'));
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

            return view('calculo_tiempos.index',
                ['usersl'=>$usersl, 'roles'=>$roles,'rolesl'=>$rolesl]
            );
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
        return view('calculo_tiempos.calcular',
           ['user' => $user]
        );
    }

    /*
    public function total(Request $request, User $user)
    {
        return view('calculo_tiempos.total',['user' => $user]);
    }
    */

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

    public function suma_horas(Request $request){
        $categorias = User::sum('tiempo')->groupBy('cedula')->get();

    }

    public function suma_permisos(User $user){

        $ced_usuario = $user->cedula;
        $estado_aprobado=1;
        $estado_desaprobado=0;
        //CONSULTAS PARA CONTAR LOS PERMISOS APROBADOS Y NO APROBADOS DE UN SOLO PROFESOR
        $consulta= DB::select('SELECT u.name,u.last_name,p.cedula,COUNT(p.cedula) as permisos FROM permiso_profesors p, users u WHERE p.cedula='.$ced_usuario.' AND u.cedula ='.$ced_usuario.' AND p.estado ='.$estado_aprobado.' GROUP BY u.name, u.last_name');
        $consulta2= DB::select('SELECT u.name,u.last_name,p.cedula,COUNT(p.cedula) as permisos FROM permiso_profesors p, users u WHERE p.cedula='.$ced_usuario.' AND u.cedula ='.$ced_usuario.' AND p.estado ='.$estado_desaprobado.' GROUP BY u.name, u.last_name');

        return view('calculo_tiempos.permisos',
        ['consulta' => $consulta,
         'consulta2' => $consulta2
        ]);
    }


    public function suma_total_tiempo(User $user, SearchTimeRequest $request){
        $request->validated();
        $ced_usuario = $user->cedula;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = Carbon::now();
        $fecha_fin = $fecha_fin->toDateTimeString();
        $estado_pendiente=0;
        $estado_aprobado=1;
        $estado_desaprobado=2;



        //CONSULTAS PARA SUMAR LOS TIEMPOS TOTALES DE LAS ASISTENCIAS
        $consulta = DB::select('SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tiempo_total))) AS tiempo_trabajado FROM reporte_asistencia r
        WHERE r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'" AND r.cedula LIKE "'.$ced_usuario.'"');

        $consulta2 = DB::select('SELECT  r.cedula,r.nombre,r.apellido  FROM reporte_asistencia r
        WHERE
        r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"
        AND r.cedula LIKE "'.$ced_usuario.'" LIMIT 1');

        //CONSULTA PARA CONTAR LOS DIAS SOLICITADOS
        $consulta4 = DB::select('SELECT COUNT(r.dia) AS num_dias FROM reporte_asistencia r WHERE r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'" AND r.cedula LIKE "'.$ced_usuario.'"');

        //CONSULTA PARA SUMAR LOS ATRASOS TOTALES
        $consulta3 = DB::select('SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(retraso_jornada))) AS retraso_trabajado FROM reporte_asistencia r
        WHERE r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'" AND r.cedula LIKE "'.$ced_usuario.'"');

        //CONSULTAS PARA CONTAR LOS PERMISOS APROBADOS, NO APROBADOS Y PENDIENTES DE UN SOLO PROFESOR
        $consulta5= DB::select('SELECT u.name,u.last_name,p.cedula,COUNT(p.cedula) as permisos1 FROM permiso_profesors p, users u WHERE p.cedula='.$ced_usuario.' AND u.cedula ='.$ced_usuario.' AND p.estado ='.$estado_aprobado.' AND  p.created_at BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'" GROUP BY u.name, u.last_name');
        $consulta6= DB::select('SELECT u.name,u.last_name,p.cedula,COUNT(p.cedula) as permisos2 FROM permiso_profesors p, users u WHERE p.cedula='.$ced_usuario.' AND u.cedula ='.$ced_usuario.' AND p.estado ='.$estado_desaprobado.' AND  p.created_at BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'" GROUP BY u.name, u.last_name');
        $consulta9= DB::select('SELECT u.name,u.last_name,p.cedula,COUNT(p.cedula) as permisos3 FROM permiso_profesors p, users u WHERE p.cedula='.$ced_usuario.' AND u.cedula ='.$ced_usuario.' AND p.estado ='.$estado_pendiente.' AND  p.created_at BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'" GROUP BY u.name, u.last_name');

        //CONSULTA PARA SUMAR LOS TIEMPOS DE LOS PERMISOS
        $consulta7 = DB::select('SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tiempo_total))) AS tiempo_permiso FROM reporte_permiso r
        WHERE r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'" AND r.cedula LIKE "'.$ced_usuario.'"');

        //CONSULTA PARA CONTAR LOS PERMISOS SOLICITADOS
        $consulta8 = DB::select('SELECT COUNT(p.cedula) AS cantidad_permisos FROM permiso_profesors p WHERE p.cedula LIKE "'.$ced_usuario.'" AND  p.created_at BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"');

        //CONSULTA PARA MOSTRAR TIEMPOS DE REPOSICION
        $reposicion=DB::select('SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas))) AS tiempo_reposicions FROM tiempo_reposicions WHERE cedula = "'.$ced_usuario.'" AND estado = "2"');
        //Log::info('aqui');
        //Log::info($reposicion);

        return view('calculo_tiempos.total',
        [   'consulta' => $consulta,
            'consulta2'=>$consulta2,
            'consulta3'=> $consulta3,
            'consulta4'=> $consulta4,
            'consulta5'=> $consulta5,
            'consulta6'=> $consulta6,
            'consulta7'=> $consulta7,
            'consulta8'=> $consulta8,
            'consulta9'=> $consulta9,
            'reposicion'=> $reposicion
        ]

    );


    }

    public function exportPdf(Request $request){
        //$informes=$request->cedula;

        $informe = array(
            "cedula" =>$request['pdfcedula'],
            "nombre" => $request['pdfnombre'],
            "apellido" => $request['pdfapellido'],
            "totaltrabajado" => $request['pdftotaltrabajado'],
            "dias" => $request['pdfdias'],
            "horas" => $request['pdfhoras'],
            "atrasos" => $request['pdfatrasos'],
            "total" => $request['pdftotal'],
            "permisos" => $request['pdfpermisos'],
            "aprobados" => $request['pdfaprobados'],
            "desaprobados" => $request['pdfdesaprobados'],
            "pendientes" => $request['pdfpendientes'],
            "reposicion" => $request['pdfreposicion'],
        );

        $pdf=PDF::loadView('pdf.informes', array('informe'=>$informe));

        return $pdf->download('informes.pdf');
    }

}
