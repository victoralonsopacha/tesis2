<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspectorController extends Controller
{
    //
    public function perfil()
    {
        return view('perfiles.inspector');
    }

    public function dashboard()
    {
        return view('dashboard.inspector');
    }
}
