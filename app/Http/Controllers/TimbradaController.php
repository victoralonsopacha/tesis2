<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportTimbradaRequest;
use Illuminate\Http\Request;
use App\Models\Timbrada;
use Excel;
use App\Imports\TimbradaImport;
use Illuminate\Support\Facades\Log;

class TimbradaController extends Controller
{
    //middleware Auth
    function __construct()
    {
        $this->middleware('auth');
    }

    public function importForm(){
        return view('import-form');
    }

    public function import(Request $request){
        if($request->file){

            Excel::import(new TimbradaImport, $request->file);
            return view('import-succes');
        }else{
            return view('import-form');
        }

    }
}
