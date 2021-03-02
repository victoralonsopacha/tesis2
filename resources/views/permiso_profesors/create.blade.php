@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h1>Crear Permiso</h1>
    <div class="pull-left">
        <a class="btn btn-primary" href="{{ route('permiso_profesors.shows') }}">Regresar</a>
    </div>
    <br><br><br>
    @include('partials.validation-errors')
        {!! Form::open(array('route' => 'permiso_profesors.store','method'=>'POST')) !!}
        {!! Form::token() !!}
        @include('permiso_profesors._form')
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success">Crear Permiso</button>
        </div>
        {!! Form::close() !!}
 
    </div>

@endsection
