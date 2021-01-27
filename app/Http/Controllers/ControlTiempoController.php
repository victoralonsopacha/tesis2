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




    public function index()
    {
        $usersl= User::where('cargo','=','profesor')->get();
        return view('calculo_tiempos.index', compact('usersl'));
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

    public function total(Request $request, User $user)
    {
        return view('calculo_tiempos.total',['user' => $request]);
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

    public function suma_horas(Request $request){
        $categorias = User::sum('tiempo')->groupBy('cedula')->get();

    }




    public function suma_permisos(User $user){
        
        $ced_usuario = $user->cedula;
        $estado_aprobado=1;
        $estado_desaprobado=0;
        $consulta= DB::select('SELECT u.name,u.last_name,p.cedula,COUNT(p.cedula) as permisos FROM permiso_profesors p, users u WHERE p.cedula='.$ced_usuario.' AND u.cedula ='.$ced_usuario.' AND p.estado ='.$estado_aprobado.' GROUP BY u.name, u.last_name');
        $consulta2= DB::select('SELECT u.name,u.last_name,p.cedula,COUNT(p.cedula) as permisos FROM permiso_profesors p, users u WHERE p.cedula='.$ced_usuario.' AND u.cedula ='.$ced_usuario.' AND p.estado ='.$estado_desaprobado.' GROUP BY u.name, u.last_name');

        return view('calculo_tiempos.permisos', 
        ['consulta' => $consulta,
         'consulta2' => $consulta2       
        ]
        
    );


    }

}
