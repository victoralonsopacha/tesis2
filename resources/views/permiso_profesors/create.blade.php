@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Crear Permisos</div>
        </div>
        <h4>Este módulo te permite crear un permiso</h4>
        <br>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('permiso_profesors.shows') }}">Regresar</a>
        </div>
        <br><br><br>
        @include('partials.validation-errors')
        <form action="{{route('permiso_profesors.store')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @include('permiso_profesors._form')
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success">Crear Permiso</button>
        </div>
        </form>

    </div>

@endsection
