@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>Editar Permiso</h1>

    <form method="POST" action="{{ route('permisos.update', $permiso) }}">
        @csrf @method('PATCH')
        @include('permisos._form')
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
    <!--
        <div class="col-6 col-md-6 col-sm-6">
            <form action="{{route('permisos.destroy', $permiso)}}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"ss>Eliminar</button>
            </form>
        </div>
    <br>-->

@endsection
