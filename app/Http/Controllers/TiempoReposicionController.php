<?php

namespace App\Http\Controllers;

use App\Models\Jornada;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\TiempoReposicion;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class TiempoReposicionController extends Controller
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
        if($request) {
            $cedula = trim($request->get('cedula'));
            if($cedula == ''){
                $tiempos = TiempoReposicion::orderBy('id','desc')->get();
            }
            $tiempos = TiempoReposicion::where('cedula', 'LIKE','%'.$cedula.'%')
                ->orderBy('id','desc')
                ->get();
        }
        return view('tiempo_reposicions.index', ['tiempos'=>$tiempos]);
    }

    //Perfil Profesor Show
    public function shows(Request $request)
    {
        $cedula = auth()->user()->cedula;
        $fecha_inicio = auth()->user()->fecha_ingreso;
        $fecha_fin=Carbon::now();
        $atrasos=DB::table('reporte_asistencia')
            ->where('cedula', $cedula)
            ->where('retraso_jornada','!=','00:00:00')
            ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
            ->get();

        $tiempos = TiempoReposicion::where('cedula', '=',$cedula)
            ->orderBy('id','desc')->paginate(10);

        $estado_aprobado=1;

        $totalreposicion = DB::select('SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas))) AS total_reposicion 
        FROM tiempo_reposicions r where r.cedula ='.$cedula.' AND r.estado ='.$estado_aprobado.'');
        foreach($totalreposicion as $repo){
            $totalReposicion = $repo->total_reposicion;
        }        

        if($atrasos->isEmpty()) {
                $totalHoras = 0;
            }else {
                $total = 0;
    
                foreach ($atrasos as $atraso) {
                    $horas[] = $atraso->retraso_jornada;
                }
                foreach ($horas as $h) {
                    $parts = explode(":", $h);
                    $total += $parts[2] + $parts[1] * 60 + $parts[0] * 3600;
                }
                $totalHoras = gmdate("H:i:s", $total);
            }      

            $start_time = strtotime($totalHoras);
            $end_time = strtotime($totalReposicion);
            $diff = $end_time - $start_time;
            $total=date("H:i:s", $diff);

            

        return view('tiempo_reposicions.shows', ['tiempos'=>$tiempos,
        'totalHoras'=>$totalHoras,
        'totalReposicion'=>$totalReposicion,
        'total'=>$total,]);
    }

    public function index_inspector(Request $request)
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

            return view('tiempo_reposicions.index_inspector', ['usersl'=>$usersl, 'roles'=>$roles,'rolesl'=>$rolesl]);
        }
    }

    public function ver_dias(User $user, TiempoReposicion $tiempo_reposicion){

        $ced_usuario=$user->cedula;
        $consulta = TiempoReposicion::where('cedula','=',$ced_usuario)
            ->orderBy('id','desc')
            ->paginate(10);
        //$consulta2 = DB::select('SELECT * FROM usuers s WHERE s.cedula LIKE  "'.$ced_usuario.'"');

        return (view('tiempo_reposicions.ver_dias', ['consulta' => $consulta,'user'=>$user]));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiempo_reposicions.create',[
            'tiempo_reposicions' => new TiempoReposicion
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TiempoReposicion $tiempo_reposicion,Request $request)
    {
        $this->validate($request, [
            'horas' => 'required',
            'fecha' => 'required',
        ]);
        $tiempo=$request->all();
        $tiempo['estado']='0';
        TiempoReposicion::create($tiempo);
        return redirect()->route('tiempo_reposicions.create',$tiempo)
            ->with('message','Su solicitud ha sido procesada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param TiempoReposicion $reposicion
     * @param $consulta
     * @return \Illuminate\Http\Response
     */

    public function active($id)
    {
        $cedula = auth()->user()->cedula;
        $tiempo=TiempoReposicion::find($id);
        $input['inspector_cedula']=$cedula;
        $input['estado']='1';
        $tiempo->update($input);
        return redirect()->back()->with('message','El atraso ha sido aprobado');
    }
    public function desactive($id)
    {
        $cedula = auth()->user()->cedula;
        $tiempo=TiempoReposicion::find($id);
        $input['inspector_cedula']=$cedula;
        $input['estado']='2';
        $tiempo->update($input);
        return redirect()->back()->with('error','El atraso ha sido rechazado');
    }
    public function show(TiempoReposicion $reposicion)
    {
        $cedula=$reposicion->cedula;
        $fecha=$reposicion->fecha;
        $horas=$reposicion->horas;

        $consultas=DB::table('reporte_asistencia')
            ->select('cedula','fecha', 'tiempo_total')
            ->where('cedula','=',$cedula)
            ->where('fecha','=',$fecha)
            ->get();

        if($consultas == '[]'){
            return redirect()->back()->with('message', 'El usuario aun no ha recuperado este atraso');
        }
        else {

            foreach ($consultas as $consulta) {
                $tiempo_total = $consulta->tiempo_total;
                $tiempo_real = Carbon::parse($tiempo_total)->format('H');
                $tiempo_propuesto = Carbon::parse($horas)->format('H');
                if ($tiempo_real == $tiempo_propuesto || $tiempo_real > $tiempo_propuesto ) {
                    $r['estado'] = '2';
                    $reposicion->update($r);
                    return redirect()->back()->with('message', 'El usuario HA recuperado correctamente el atraso');
                }

                if ($tiempo_real < $tiempo_propuesto) {
                    $r['estado'] = '1';
                    $reposicion->update($r);
                    return redirect()->back()->with('message', 'El usuario NO ha recuperado correctamente el atraso');
                }
            }


        }
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
