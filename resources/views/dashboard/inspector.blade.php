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
            <div class="col-sm-4">
                Permisos por Aprobar
            </div>
            <div class="col-sm-4">
                Permisos Aprobados
            </div>
            <div class="col-sm-4">
                Permisos Rechazados
            </div>
        </div>

    </div>
@endsection
