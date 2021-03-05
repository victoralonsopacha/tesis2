@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Mi Informacion</div>
        </div>
        <a class="btn btn-primary" href="{{ route('perfil.profesor') }}">Regresar</a>
        <br><br>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
            </div>
        @endif
        {!! Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id]]) !!}
        @csrf
        @include('perfiles.form')
        <button type="submit" class="btn btn-warning">Actualizar</button>
        {!! Form::close() !!}
    </div>


@endsection
