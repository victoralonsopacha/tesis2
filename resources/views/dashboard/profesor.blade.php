@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="panel panel-primary">
        <div class="panel-heading">Dashboard</div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="background: #3bc492">
                    <div class="caption">
                        <h3>{{count($permisos_reprobados)}} Permisos Reprobados</h3>
                        <h4></h4>
                        <p><a href="#" class="btn btn-primary" role="button">Ver detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="background: #00acd6">
                    <div class="caption">
                        <h3>{{count($permisos_aprobados)}} Permisos Aprobados</h3>
                        <h4></h4>
                        <p><a href="#" class="btn btn-primary" role="button">Ver detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="background: #5d59a6">
                    <div class="caption">
                        <h3> Retrasos</h3>
                        <p><a href="#" class="btn btn-primary" role="button">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
