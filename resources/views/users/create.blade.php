@extends('layout')

@section('title', 'Crear Usuario')
    
@section('content')
    <h1>Crear Usuario</h1>

    @include('partials.validation-errors')


    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        
        @include('users._form')

        <button>Guardar</button>
    </form>
@endsection