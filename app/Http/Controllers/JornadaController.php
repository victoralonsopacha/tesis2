<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchTimeRequest;
use App\Models\Horario;
use App\Models\Jornada;
use App\Models\PermisoProfesor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JornadaController extends Controller
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
        //
        $cedula = auth()->user()->cedula;
        $fecha_actual=Carbon::now()->format('Y,m,d');
        $jornadas=Jornada::where('cedula', $cedula)
            ->orderBy('fecha','desc')
            ->paginate(10);
        Log::info($jornadas);

        return view('jornada.index',compact('jornadas'));
    }

    public function buscar(SearchTimeRequest $request)
    {
        $request->validated();
        $cedula = auth()->user()->cedula;
        $fecha_inicio=$request->input('fecha_inicio');
        $fecha_fin=$request->input('fecha_fin');
        $jornadas=DB::table('reporte_asistencia')
            ->select('anio','mes_nombre','dia','fecha', 'hora_entrada','hora_salida','tiempo_total')
            ->where('cedula', $cedula)
            ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
            ->orderBy('fecha','desc')
            ->paginate(10);

        return view('jornada.index',compact('jornadas'));

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
    public function show($id)
    {
        //
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
