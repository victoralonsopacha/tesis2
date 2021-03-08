<?php

namespace App\Exports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class TimbradasExport implements FromView
{

    use Exportable;

    protected $cedula;
    protected $fechaInicio;
    protected $fechaFin;

    public function __construct($cedula,$fechaInicio,$fechaFin,$identificador)
    {
        $this->cedula = $cedula;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->identificador = $identificador;


    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $ced_usuario = $this->cedula;
        $fecha_inicio =$this->fechaInicio;
        $fecha_fin = $this->fechaFin;
        $identificador = $this->identificador;
        //Log::info($ced_usuario);
        //Log::info($fecha_inicio);
        //Log::info($fecha_fin);
        if($identificador == 1){
            $consultas = DB::select('SELECT * FROM timbrada_permisos r WHERE r.cedula =  "'.$ced_usuario.'" AND r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"');
        //Log::info($consultas);
        return view('excel.permisos', [
            'consultas' =>$consultas
        ]);
        }else{
            //CONSULTA LISTAR LOS TIMBRADOS CON UN USUARIO Y ENTRE FECHAS
        $consultas = DB::select('SELECT * FROM timbradas r WHERE r.cedula =  "'.$ced_usuario.'" AND r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"');
        //Log::info($consultas);
        return view('excel.timbradas', [
            'consultas' =>$consultas
        ]);
        }

        
    }

    public function view2(): View
    {
        $ced_usuario = $this->cedula;
        $fecha_inicio =$this->fechaInicio;
        $fecha_fin = $this->fechaFin;
        Log::info($ced_usuario);
        Log::info($fecha_inicio);
        Log::info($fecha_fin);
        //CONSULTA LISTAR LOS TIMBRADOS CON UN USUARIO Y ENTRE FECHAS
        $consultas = DB::select('SELECT * FROM timbradas_permisos r WHERE r.cedula =  "'.$ced_usuario.'" AND r.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"');
        //Log::info($consultas);
        return view('excel.permisos', [
            'consultas' =>$consultas
        ]);
    }
}
