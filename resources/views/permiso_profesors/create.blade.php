@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>Crear Permiso</h1>

    @include('partials.validation-errors')


    <form method="POST" action="{{ route('permiso_profesors.store') }}">
        @csrf
        @include('permiso_profesors._form')

        <button type="submit" class="btn btn-info">Guardar</button>
    </form>
@endsection
