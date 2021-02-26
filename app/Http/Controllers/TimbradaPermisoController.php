<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimbradaPermiso;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Spatie\Permission\Models\Role;


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
            $usersl = User::where('cedula', 'LIKE', '%'.$query.'%')
                ->where('estado','=','1')
                ->orderBy('id','asc')->get();
            $roles=DB::table('model_has_roles')
                ->select('role_id', 'model_id')
                ->get();
            $rolesl=DB::table('roles')
                ->where('id','=','2')
                ->select('id', 'name')
                ->get();
            return view('timbrada_permisos.index', ['usersl'=>$usersl, 'buscador'=>$query,'roles'=>$roles, 'rolesl'=>$rolesl]);
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

        return view('timbrada_permisos.create',[
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
        $permiso['tipo_permiso']=implode($request['tipo_permiso']);
        TimbradaPermiso::create($permiso);

        return redirect()->route('timbrada_permisos.index')->with('message', 'Usted ha timbrado con exito');

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
