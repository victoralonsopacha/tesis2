<?php

namespace App\Http\Controllers;

use App\Models\Justificacion;
use Illuminate\Http\Request;

class JustificacionController extends Controller
{
    //
    //middleware Auth
    function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $justificaciones= Justificacion::get();
        return view('justificaciones.index',compact('justificaciones'));
    }
}
