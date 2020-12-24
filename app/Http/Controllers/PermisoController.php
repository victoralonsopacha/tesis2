<?php

namespace App\Http\Controllers;

use App\Models\Permiso;

use Illuminate\Http\Request;

use App\Http\Requests\SavePermisoRequet;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisosl= Permiso::get();
        return view('permisos.index', compact('permisosl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permisos.create',[
            'permiso' => new Permiso
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePermisoRequet $request)
    {
        Permiso::create($request->validated());
        return redirect()->route('permisos.index')->with('status', 'El permiso fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($permiso)
    {
        return view('permisos.show', [
            'permiso' => $permiso 
            //'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($permiso)
    {
        return view('permisos.edit', [
            'permiso' => $permiso 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Permiso $permiso, SavePermisoRequet $request)
    {
        $permiso->update( $request->validated() );

        return redirect()->route('permisos.show', $permiso)->with('status', 'El permiso ha sido actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permiso $permiso)
    {
        $permiso->delete();

        return redirect()->route('permisos.index')->with('status', 'El permiso ha sido eliminado');

    }
}
