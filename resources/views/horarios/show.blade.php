@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>{{ $user->name }} {{$user->last_name}}</h1>

    <a href="{{ route('horarios.edit', $user) }}">Editar</a>


    <p>{{$user->cargo}}</p>
    <p>{{$user->fecha_ingreso}}</p>
@endsection

