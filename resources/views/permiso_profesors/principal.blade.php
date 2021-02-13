@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h2>GESTIONAR PERMISOS</h2>
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-success btn-group-justified" href="{{ route('permiso_profesors.shows') }}">Ver todos los permisos</a>
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a class="btn btn-info btn-group-justified" href="{{ route('permiso_profesors.create')}}">Crear Nuevo Permiso</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Permisos Aprobados</h3>
                    <a href="{{ route('permiso_profesors.index', ['permiso_profesor' => $permiso_profesor=auth()->user()->cedula]) }}">Ver más</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Permisos Rechazados</h3>
                    <a href="{{ route('permiso_profesors.index1', ['permiso_profesor' => $permiso_profesor=auth()->user()->cedula]) }}">Ver más</a>
                </div>
            </div>
        </div>
    </div>
@endsection
