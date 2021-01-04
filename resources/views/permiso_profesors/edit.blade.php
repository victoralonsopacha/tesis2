@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>Editar Permiso</h1>

    <form method="POST" action="{{ route('permiso_profesors.update', $permiso_profesor) }}">
        @csrf @method('PATCH')
        @include('permiso_profesors._form')
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
    
        <div class="col-6 col-md-6 col-sm-6">
            <form action="{{route('permiso_profesors.destroy', $permiso_profesor)}}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"ss>Eliminar</button>
            </form>
        </div>
    <br>
    

@endsection
