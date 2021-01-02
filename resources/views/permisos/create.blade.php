@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>Crear Permiso</h1>

    @include('partials.validation-errors')


    <form method="POST" action="{{ route('permisos.store') }}">
        @csrf
        @include('permisos._form')

        <button type="submit" class="btn btn-info">Guardar</button>
    </form>
@endsection
