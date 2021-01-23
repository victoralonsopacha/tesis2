@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>Editar Permiso</h1>

    <form method="POST" action="{{ route('horarios.update', $user) }}">
        @csrf @method('PATCH')



        <label for="">
            Cedula del usuario
            <input type="text" name="cedula" value="{{old('cedula', $user->cedula)}}">
        </label>
        <br>
        <label for="">
            Nombre del usuario
            <input type="text" name="name" value="{{ old('name', $user->name) }}">
        </label>
        <br>
        <label for="">
            Apellido del usuario
            <input type="text" name="last_name" value="{{old('last_name', $user->last_name)}}">
        </label>
        <br>
        <br>
        <label for="">
            Hora Entrada
            <input type="text" name="hora_entrada" value="{{old('hora_entrada', $user->hora_entrada)}}">
            <input type="time" name="hora_entrada" value="{{old('hora_entrada')}}">
        </label>
        <br>
        <label for="">
            Hora Salida
            <input type="text" name="hora_salida" value="{{old('hora_salida',$user->hora_salida)}}">
            <input type="time" name="hora_salida" value="{{old('hora_salida')}}">
        </label>
        <br>
        <label for="">
            Tipo
            <input type="text" name="tipo" value="{{old('tipo',$user->tipo)}}">
        </label>
        <br>



        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
    

    

@endsection
