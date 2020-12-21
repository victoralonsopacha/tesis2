@extends('layout')

@section('title', 'Crear Usuario')
    
@section('content')
    <h1>Crear Usuario</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <label for="">
            Nombre del usuario
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <br>
        <label for="">
            Apellido del usuario
            <input type="text" name="last_name" value="{{old('last_name')}}">
        </label>
        <br>
        <label for="">
            Email del usuario
            <input type="email" name="email" value="{{old('email')}}">
        </label>
        <br>
        <label for="">
            Pass del usuario
            <input type="text" name="password" value="{{old('password')}}">
        </label>
        <br>
        <label for="">
            Cedula del usuario
            <input type="text" name="cedula" value="{{old('cedula')}}">
        </label>
        <br>
        <label for="">
            Tipo relacion laboral del usuario
            <input type="text" name="tipo_relacion_laboral" value="{{old('tipo_relacion_laboral')}}">
        </label>
        <br>
        <label for="">
            Cargo del usuario
            <input type="text" name="cargo" value="{{old('cargo')}}">
        </label>
        <br>
        <label for="">
            Fecha de ingreso del usuario
            <input type="date" name="fecha_ingreso" value="{{old('fecha_ingreso')}}">
        </label>
        <br>
        <button>Guardar</button>
    </form>
@endsection