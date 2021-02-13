@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="panel panel-primary">
        <div class="panel-heading">Perfil Inspector</div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-8 col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="fecha_inicio" value="{{Auth::user()->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Apellido</label>
                    <div class="col-8 col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="fecha_inicio" value="{{Auth::user()->lastname}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-8 col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="fecha_inicio" value="{{Auth::user()->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Cargo</label>
                    <div class="col-8 col-md-8 col-sm-8">
                        <input type="password" class="form-control" name="fecha_inicio" value="{{Auth::user()->password}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">C.I</label>
                    <div class="col-8 col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="fecha_inicio" value="{{Auth::user()->cedula}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Relacion Laboral</label>
                    <div class="col-8 col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="fecha_inicio" value="{{Auth::user()->tipo_relacion_laboral}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Cargo</label>
                    <div class="col-8 col-md-8 col-sm-8">
                        <input type="text" class="form-control" name="fecha_inicio" value="{{Auth::user()->cargo}}">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
