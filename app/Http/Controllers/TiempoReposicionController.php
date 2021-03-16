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

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tiempos=TiempoReposicion::all();
        return view('tiempo_reposicions.index', ['tiempos'=>$tiempos]);

    }


    public function index_inspector(Request $request)
    {
        if($request){
            $query= trim($request->get('buscador'));
            $usersl = User::where('cedula', 'LIKE', '%'.$query.'%')
                ->where('estado','=','1')
                ->orderBy('id','asc')
                ->get();
            $roles=DB::table('model_has_roles')
                ->select('role_id', 'model_id')
                ->get();
            $rolesl=DB::table('roles')
                ->where('id','=','2')
                ->select('id', 'name')
                ->get();
            return view('tiempo_reposicions.index_inspector', ['usersl'=>$usersl, 'buscador'=>$query , 'roles'=>$roles,'rolesl'=>$rolesl]);
        }
    }

    public function ver_dias(User $user, TiempoReposicion $tiempo_reposicion){

        $ced_usuario=$user->cedula;
        $consulta = DB::select('SELECT * FROM tiempo_reposicions t WHERE t.cedula LIKE  "'.$ced_usuario.'"');
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
        $tiempo=$request->all();
        $tiempo['estado']='1';
        TiempoReposicion::create($tiempo);
        return redirect()->route('tiempo_reposicions.create',$tiempo);
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
        $tiempo=TiempoReposicion::find($id);
        $input['estado']='1';
        $tiempo->update($input);
        return redirect()->back()->with('message','El atraso ha sido aprobado');
    }
    public function desactive($id)
    {
        $tiempo=TiempoReposicion::find($id);
        $input['estado']='2';
        $tiempo->update($input);
        return redirect()->back()->with('message','El atraso ha sido desaprobado');
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
