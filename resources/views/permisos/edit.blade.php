@extends('layout')

@section('title', 'Crear Permiso')
    
@section('content')
    <h1>Editar Permiso</h1>

    @include('partials.validation-errors')
    

    <form method="POST" action="{{ route('permisos.update', $permiso) }}">
        @csrf @method('PATCH')
        

        @include('permisos._form')



        <button>Actualizar</button>
    </form>
@endsection