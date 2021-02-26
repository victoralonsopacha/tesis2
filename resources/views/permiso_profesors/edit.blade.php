@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h1>Editar Permiso</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('permiso_profesors.shows')}}">Regresar</a>
        </div>
        <br><br>
        {!! Form::model($permiso_profesor, ['method' => 'PATCH','route' => ['permiso_profesors.update', $permiso_profesor]]) !!}
        {!! Form::token() !!}
            @include('permiso_profesors._form')
            <button type="submit" class="btn btn-success">Actualizar</button>
        {!! Form::close() !!}
        <br>
        {!! Form::model($permiso_profesor, ['method' => 'POST','route' => ['permiso_profesors.destroy', $permiso_profesor]]) !!}
        {!! Form::token() !!}
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
        {!! Form::close() !!}
    </div>
@endsection
