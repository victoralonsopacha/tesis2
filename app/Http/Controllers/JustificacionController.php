<?php

namespace App\Http\Controllers;

use App\Models\Justificacion;
use Illuminate\Http\Request;

class JustificacionController extends Controller
{
    //
    public function index()
    {
        $justificaciones= Justificacion::get();
        return view('justificaciones.index',compact('justificaciones'));
    }
}
