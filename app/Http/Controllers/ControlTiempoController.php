<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;


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
            $query= trim($request->get('buscador'));
            $usersl = User::where('cedula', 'LIKE', '%'.$query.'%')->orderBy('id','asc')->get();
            
            return view('calculo_tiempos.index', ['usersl'=>$usersl, 'buscador'=>$query]);
        }
        //CONSULTA PARA EXTRAER SOLO LOS PERMISOS CONPERFIL DE PROFESOR 
        /*
        $usersl= User::where('cargo','=','profesor')->get();
        return view('calculo_tiempos.index', compact('usersl'));
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


    public function suma_total_tiempo(User $user, Request $request){
        $ced_usuario = $user->cedula;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $estado_aprobado=1;
        $estado_desaprobado=0;

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

        //CONSULTAS PARA CONTAR LOS PERMISOS APROBADOS Y NO APROBADOS DE UN SOLO PROFESOR
        $consulta5= DB::select('SELECT u.name,u.last_name,p.cedula,COUNT(p.cedula) as permisos FROM permiso_profesors p, users u WHERE p.cedula='.$ced_usuario.' AND u.cedula ='.$ced_usuario.' AND p.estado ='.$estado_aprobado.' GROUP BY u.name, u.last_name');
        $consulta6= DB::select('SELECT u.name,u.last_name,p.cedula,COUNT(p.cedula) as permisos FROM permiso_profesors p, users u WHERE p.cedula='.$ced_usuario.' AND u.cedula ='.$ced_usuario.' AND p.estado ='.$estado_desaprobado.' GROUP BY u.name, u.last_name');
        
        //CONSULTA PARA SUMAR LOS TIEMPOS DE LOS PERMISOS
        $consulta7 = DB::select('SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tiempo_total))) AS tiempo_permiso FROM reporte_permiso r 
        WHERE r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'" AND r.cedula LIKE "'.$ced_usuario.'"');

        //CONSULTA PARA CONTAR LOS PERMISOS SOLICITADOS
        $consulta8 = DB::select('SELECT COUNT(p.cedula) AS cantidad_permisos FROM permiso_profesors p WHERE p.cedula LIKE "'.$ced_usuario.'"');


        return view('calculo_tiempos.total',
        [   'consulta' => $consulta,
            'consulta2'=>$consulta2,
            'consulta3'=> $consulta3,
            'consulta4'=> $consulta4,
            'consulta5'=> $consulta5,
            'consulta6'=> $consulta6,
            'consulta7'=> $consulta7,
            'consulta8'=> $consulta8
            
            
        ]
    
    );

    


    }

}
