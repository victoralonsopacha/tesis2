@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>PERMISO </h1>
    <td>{!! $estado!!}</td>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Cedula del usuario</label>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Inicio</label>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Fin</label>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Hora Inicio</label>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Hora Fin</label>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
        <div class="col-sm-6">
        </div>
    </div>



@endsection

