@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Editar Usuario</div>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('users.activos') }}">Regresar</a>
        </div>
        <br><br>
        @include('partials.validation-errors')
        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
        @include('users._form')
        <button type="submit" class="btn btn-success">Actualizar</button>
        {!! Form::close() !!}
    </div>
@endsection
