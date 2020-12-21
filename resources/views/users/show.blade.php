@extends('layout')

@section('title', 'Usuarios | '.$user->name)

@section('content')
    <h1>{{ $user->name }} {{$user->last_name}}</h1>

    <a href="{{ route('users.edit', $user) }}">Editar</a>

    <form action="{{route('users.destroy', $user)}}" method="POST">
        @csrf @method('DELETE')
        <button>Eliminar</button>
    </form>

    <p>{{$user->cargo}}</p>
    <p>{{$user->fecha_ingreso}}</p>
@endsection

