@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Mi Informacion</div>
    </div>
    <a class="btn btn-primary" href="{{ route('profile.inspector') }}">Regresar</a>
    <br><br>
    @include('partials.validationMessage')
    @include('partials.validation-errors')

    {!! Form::model($user, ['method' => 'PATCH','route' => ['inspector.update', $user->id]]) !!}
    @csrf
    @include('perfiles.form')
    <button type="submit" class="btn btn-warning">Actualizar</button>
    {!! Form::close() !!}
</div>


@endsection
