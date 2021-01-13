@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>Editar Usuario</h1>

    @include('partials.validation-errors')


    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf @method('PATCH')
        @include('users._form')
        <button>Actualizar</button>
    </form>
@endsection
