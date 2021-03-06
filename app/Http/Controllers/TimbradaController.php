<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportTimbradaRequest;
use Illuminate\Http\Request;
use App\Models\Timbrada;
use Excel;
use App\Imports\TimbradaImport;

class TimbradaController extends Controller
{
    public function importForm(){
        return view('import-form');
    }

    public function import(ImportTimbradaRequest $request){

        if($request->file){
            Excel::import(new TimbradaImport, $request->file);
            //return view('import-succes');
        }else{
            //return view('import-form');
        }

    }
}
