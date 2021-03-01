<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\TiempoReposicion;

use App\Models\User;

class TiempoReposicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tiempo_reposicions.index');
    }


    public function index_inspector(Request $request)
    {
        if($request){
            $query= trim($request->get('buscador'));
            $usersl = User::where('cedula', 'LIKE', '%'.$query.'%')->orderBy('id','asc')->get();
            
            return view('tiempo_reposicions.index_inspector', ['usersl'=>$usersl, 'buscador'=>$query]);
        }
    }

    public function ver_dias(User $user, TiempoReposicion $tiempo_reposicion){
        
        $ced_usuario=$user->cedula;
        $consulta = DB::select('SELECT * FROM tiempo_reposicions t WHERE t.cedula LIKE  "'.$ced_usuario.'"');
        //$consulta2 = DB::select('SELECT * FROM usuers s WHERE s.cedula LIKE  "'.$ced_usuario.'"');

        return (view('tiempo_reposicions.ver_dias', ['consulta' => $consulta]));


    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiempo_reposicions.create',[
            'tiempo_reposicions' => new TiempoReposicion
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TiempoReposicion $tiempo_reposicion,Request $request)
    {
        $request->all();
        TiempoReposicion::create($request->all());
        return redirect()->route('tiempo_reposicions.create',$request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
