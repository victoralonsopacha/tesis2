@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>Crear Usuario</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        @include('users._form')

        <button>Guardar</button>
    </form>
@endsection
