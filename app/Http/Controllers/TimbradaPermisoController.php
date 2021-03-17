<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimbradaPermiso;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;


class TimbradaPermisoController extends Controller
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
                $usersl = User::where('cedula', 'LIKE', '%'.$cedula.'%')
                    ->where('estado','=','1')
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

            return view('timbrada_permisos.index',
                ['usersl'=>$usersl, 'roles'=>$roles, 'rolesl'=>$rolesl]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,TimbradaPermiso $permiso)
    {
        $fecha_hora= Carbon::now();
        $user=User::find($id);
        $ced_usuario=$user->cedula;
        $tipo_permiso = array(
            "entrada" => "Entrada",
            "salida" => "Salida"
        );

        $consulta = DB::select('SELECT * FROM users t WHERE t.cedula LIKE  "'.$ced_usuario.'"');

        return view('timbrada_permisos.creates',[
            'consulta' => $consulta,
            'fecha_hora' => $fecha_hora,
            'tipo_permiso' => $tipo_permiso
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
        $permiso=$request->all();
        $permiso['estado']='0';
        $cedula=$request['cedula'];
        $fecha=$request['fecha'];
        $tipo_permiso=implode($request['tipo_permiso']);
        $permiso['tipo_permiso']=$tipo_permiso;

        $validate_timbrada=TimbradaPermiso::where('cedula','=',$cedula)
            ->where('fecha','=',$fecha)
            ->where('tipo_permiso','=',$tipo_permiso)
            ->count();
        Log::info('Controlador Timbrada');
        Log::info($validate_timbrada);

        if($validate_timbrada == 0){
            TimbradaPermiso::create($permiso);
            return redirect()->route('timbrada_permisos.index')->with('message', 'Usted ha timbrado con exito');
        }
        else{
            return redirect()->route('timbrada_permisos.index')->with('error', 'Usted NO ha timbrado con exito');
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
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
