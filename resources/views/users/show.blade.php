@extends('layout')

@section('title', 'Usuarios | '.$user->name)

@section('content')
    <h1>{{ $user->name }} {{$user->last_name}}</h1>
    <p>{{$user->cargo}}</p>
    <p>{{$user->fecha_ingreso}}</p>
@endsection

