@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h2>PERMISOS DESAPROBADOS</h2>
    <div class="pull-left">
        <a href="{{ route('permiso_profesors.shows') }}"
           class="btn btn-primary">Regresar</a>
    </div>
    <div class="pull-right">
        <a class="btn btn-danger" href="{{ route('permiso_profesors.create')}}">Crear Nuevo Permiso</a>
    </div>
    <br><br><br>
    @include('partials.permiso_profesors_buscar')

    @if($permisosl->isEmpty())
        <div class="alert alert-danger" role="alert">No existen registros actualmente</div>
        <a href="{{route('permiso_profesors.shows')}}">Regresar a menu Permisos</a>
    @else
            <br>
        @include('permiso_profesors.form')
    @endif
    </div>
@endsection
