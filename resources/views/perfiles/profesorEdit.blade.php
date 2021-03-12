@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Mi Informacion</div>
        </div>
        <a class="btn btn-primary" href="{{ route('profile.profesor') }}">Regresar</a>
        <br><br>
        @include('partials.validationError')
        @include('partials.validationMessage')

        {!! Form::model($user, ['method' => 'PATCH','route' => ['profesor.update', $user->id]]) !!}
        @csrf
        @include('perfiles.form')
        <button type="submit" class="btn btn-warning">Actualizar</button>
        {!! Form::close() !!}

    </div>


@endsection
