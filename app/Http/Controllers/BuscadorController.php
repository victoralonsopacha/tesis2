<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function index(Request $request)
    {
        
        if($request){
            $query= trim($request->get('buscador'));
            $usersl = User::where('cedula', 'LIKE', '%'.$query.'%')->orderBy('id','asc')->get();
            
            return view('calculo_tiempos.index', ['usersl'=>$usersl, 'buscador'=>$query]);
        }
        //CONSULTA PARA EXTRAER SOLO LOS PERMISOS CONPERFIL DE PROFESOR 
        /*
        $usersl= User::where('cargo','=','profesor')->get();
        return view('calculo_tiempos.index', compact('usersl'));
        */
    }
}
