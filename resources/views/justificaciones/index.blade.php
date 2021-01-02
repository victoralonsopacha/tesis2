@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>GESTIONAR JUSTIFICACIONES</h1>
    {{--@auth--}}
    <a href="#">Crear Justificacion</a>
    {{--@endauth--}}

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Justificaciones</div>
        <!-- Table -->
        @if($justificaciones->isEmpty())
            <p>No existen registros</p>
        @else

        @endif
    </div>
@endsection
