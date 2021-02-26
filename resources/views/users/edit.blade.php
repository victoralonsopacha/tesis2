@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>Editar Usuario</h1>
    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
    @include('users._form')
    <button type="submit" class="btn btn-success">Actualizar</button>
    {!! Form::close() !!}
@endsection
