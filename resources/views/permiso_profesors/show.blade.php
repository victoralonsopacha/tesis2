@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>PERMISO </h1>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Cedula del usuario</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="cedula" value="{{ $permiso_profesor->cedula }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Inicio</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="cedula" value="{{$permiso_profesor->fecha_inicio}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Fin</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="cedula" value="{{$permiso_profesor->fecha_fin}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Hora Inicio</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="cedula" value="{{$permiso_profesor->hora_inicio}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Hora Fin</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="cedula" value="{{$permiso_profesor->hora_fin}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
        <div class="col-sm-6">
            <input type="textarea" class="form-control" name="cedula" value="{{$permiso_profesor->descripcion}}">
        </div>
    </div>

@endsection

