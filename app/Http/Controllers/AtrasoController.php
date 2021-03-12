<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtrasoController extends Controller
{
    //
    public function index()
    {
        $cedula = auth()->user()->cedula;
        $atrasos= DB::select('select fecha, hora_entrada, hora_salida, retraso_jornada
                from reporte_asistencia WHERE cedula = "'.$cedula.'" AND retraso_jornada != "00:00:00"');
        return view('atrasos.index',compact('atrasos'));

    }
    public function buscar(Request $request)
    {
        $cedula = auth()->user()->cedula;
        $fecha_inicio=$request->input('fecha_inicio');
        $fecha_fin=$request->input('fecha_fin');
        $atrasos=DB::table('reporte_asistencia')
            ->select('fecha', 'hora_entrada','hora_salida','retraso_jornada')
            ->where('cedula', $cedula)
            ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
            ->get();
        return view('atrasos.index',compact('atrasos'));
    }
}
