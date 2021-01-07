@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>GESTIONAR PERMISOS</h1>

    @auth
    <h1>Cedula Usuario: {{$cedula=auth()->user()->cedula}}</h1>        
    @endauth
    
    <a href="{{ route('permiso_profesors.create') }}">Crear Permiso</a>
    <br>
    <a href="/permiso_profesors/{{$cedula=auth()->user()->cedula}}/index">Ver permisos</a>



@endsection
