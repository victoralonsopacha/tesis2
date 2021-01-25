<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Requests\SaveHorarioRequest;
use App\Http\Requests\SaveUserRequest;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
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




    public function index(User $user)
    {
        $usersl= User::get();
        return view('horarios.index', compact('usersl'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(User $user)
    {
        return view('horarios.create', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //FORMA DIFERENTE PARA IMMPEDIR LA ASIGNACION MASIVA
        Horario::create($request);
        return redirect()->route('horarios.index')->with('status', 'El horario fue creado con exito');

        //return request();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('horarios.show', [
            'user' => $user
            //'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)

    {
        $ced_usuario = $user->cedula; 
        //$consulta = array();
       $consulta= DB::select('SELECT cedula,name,last_name,cargo,hora_entrada,hora_salida,tipo FROM horarios, users Where cedula ='.$ced_usuario.' AND id_usuario = '.$ced_usuario.'');
        return view('horarios.edit', $consulta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Horario $horario, SaveHorarioRequest $request)
    {
        $horario->update( $request->validated() );

        return redirect()->route('horario.show', $horario)->with('status', 'El horario ha sido actualizado con exito');
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
