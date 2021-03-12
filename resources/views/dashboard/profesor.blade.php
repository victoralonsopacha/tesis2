@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Dashboard</div>
    </div>

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="background: #3bc492">
                    <div class="caption">
                        <h3>{{count($permisos_reprobados)}} Permisos Reprobados</h3>
                        <h4></h4>
                        <p><a href="{{route('permiso_profesors.index1', ['permiso_profesor' => $permiso_profesor=auth()->user()->cedula])}}" class="btn btn-primary" role="button">Ver detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="background: #00acd6">
                    <div class="caption">
                        <h3>{{count($permisos_aprobados)}} Permisos Aprobados</h3>
                        <h4></h4>
                        <p><a href="{{route('permiso_profesors.index', ['permiso_profesor' => $permiso_profesor=auth()->user()->cedula])}}" class="btn btn-primary" role="button">Ver detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="background: #5d59a6">
                    <div class="caption">
                        <h3>{{count($atrasos)}} Atrasos</h3>
                        <p><a href="{{route('atrasos.index')}}" class="btn btn-primary" role="button">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

    </div><!--div container fluid-->
@endsection
