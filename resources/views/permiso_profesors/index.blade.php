@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h2>PERMISOS APROBADOS</h2>
    <div class="pull-left">
        <a href="{{ route('permiso_profesors.shows') }}"
           class="btn btn-primary">Regresar</a>
    </div>
    <div class="pull-right">
        <a class="btn btn-danger" href="{{ route('permiso_profesors.create')}}">Crear Nuevo Permiso</a>
    </div>
    <br><br><br>
        @include('partials.validation-errors')
        <div class="row">
            {!! Form::open(['route' => 'permiso_profesors.buscarA', 'method'=>'POST']) !!}
            {!! Form::token() !!}
            <div class="col-sm-1 col-lg-1">
                <strong>De:</strong>
            </div>
            <div class="col-sm-3 col-lg-3">
                {!! Form::date('fecha_inicio',null,['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-1 col-lg-1">
                <strong>Hasta:</strong>
            </div>
            <div class="col-sm-3 col-lg-3">
                {!! Form::date('fecha_fin',\Carbon\Carbon::now(),['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-3 col-lg-3">
                <button type="submit" class="btn btn-success">Buscar</button>
            </div>
            {{ Form::close() }}
        </div>
        <!-- /.row -->

    @if($permisos->isEmpty())
        <div class="alert alert-danger" role="alert">No existen registros actualmente</div>
    @else
            <br>
        @include('permiso_profesors.form')
    @endif
    </div>
@endsection
