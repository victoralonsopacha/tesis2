<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timbrada;
use Excel;
use App\Imports\TimbradaImport;

class TimbradaController extends Controller
{
    public function importForm(){
        return view('import-form');
    }

    public function import(Request $request){

        Excel::import(new TimbradaImport, $request->file);
        return view('import-succes');
    }
}
