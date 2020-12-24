@extends('layout')

@section('title', 'Crear Permiso')
    
@section('content')
    <h1>Crear Permiso</h1>

    @include('partials.validation-errors')


    <form method="POST" action="{{ route('permisos.store') }}">
        @csrf
        
        @include('permisos._form')

        <button>Guardar</button>
    </form>
@endsection