<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchTimeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtrasoController extends Controller
{
    //middleware Auth
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cedula = auth()->user()->cedula;
        $atrasos=DB::table('reporte_asistencia')
            ->select('fecha', 'hora_entrada','hora_salida','retraso_jornada','hora_entrada_horario')
            ->where('cedula', $cedula)
            ->where('retraso_jornada','!=','00:00:00')
            ->orderBy('fecha','desc')
            ->get();
            if($atrasos->isEmpty()) {
                $totalHoras = 1;
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
        
        return view('atrasos.index',compact('atrasos','totalHoras'));

    }
    


    public function buscar(SearchTimeRequest $request)
    {
        $request->validated();
        $cedula = auth()->user()->cedula;
        $fecha_inicio=$request->input('fecha_inicio');
        $fecha_fin=$request->input('fecha_fin');
        $atrasos=DB::table('reporte_asistencia')
            ->select('fecha', 'hora_entrada','hora_salida','retraso_jornada')
            ->where('cedula', $cedula)
            ->where('retraso_jornada','!=','00:00:00')
            ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
            ->orderBy('fecha','desc')
            ->get();
        return view('atrasos.index',compact('atrasos'));
    }
}
