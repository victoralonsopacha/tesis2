@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>PERMISO </h1>

    @include('partials.validation-errors')

    <a href="{{ route('permiso_profesors.edit', $permiso_profesor) }}">Editar</a>

    <form action="{{route('permiso_profesors.destroy', $permiso_profesor)}}" method="POST">
        @csrf @method('DELETE')
        <button>Eliminar</button>
    </form>

    <p>Fecha inicio: {{$permiso_profesor->fecha_inicio}}</p>
    <p>Fecha fin: {{$permiso_profesor->fecha_fin}}</p>
    <p>Hora inicio: {{$permiso_profesor->hora_inicio}}</p>
    <p>Hora fin: {{$permiso_profesor->hora_fin}}</p>
    <br>
    Imagen Adjunta:
    <br>
    <img width="200px" src="/public/{{$permiso_profesor->file}}">
    <br>
    Descripcion:
    <br>
    <textarea name="descripcion" id="" cols="30" rows="10">{{$permiso_profesor->descripcion}}</textarea>

    
@endsection

