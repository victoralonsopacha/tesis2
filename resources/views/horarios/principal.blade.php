@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>GESTIONAR PERMISOS</h1>

    @auth
    <h1>Cedula Usuario: {{auth()->user()->cedula}}</h1>
    @endauth

    <a href="{{ route('permiso_profesors.create') }}">Crear Permiso</a>
    <br>
    <a href="{{ route('permiso_profesors.index', ['permiso_profesor' => $permiso_profesor=auth()->user()->cedula]) }}">Ver permisos</a>



@endsection
