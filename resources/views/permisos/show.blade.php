@extends('layout')

@section('title', 'Permisos | '.$permiso->cedula)

@section('content')
    <h1>{{ $permiso->cedula }}</h1>

    <a href="{{ route('permisos.edit', $permiso) }}">Editar</a>

    <form action="{{route('permisos.destroy', $user)}}" method="POST">
        @csrf @method('DELETE')
        <button>Eliminar</button>
    </form>

    <p>{{$permiso->fecha_inicio}}</p>
    <p>{{$permiso->fecha_fin}}</p>
    <p>{{$permiso->hora_inicio}}</p>
    <p>{{$permiso->hora_fin}}</p>
    <textarea name="descripcion" id="" cols="30" rows="10">{{$permiso->descripcion}}</textarea>
    
@endsection

