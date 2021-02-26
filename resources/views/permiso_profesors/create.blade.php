@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>Crear Permiso</h1>
    <div class="pull-left">
        <a class="btn btn-primary" href="{{ route('permiso_profesors.shows') }}">Regresar</a>
    </div>
    <br><br><br>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ooops!</strong> Encontramos algunos problemas<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        {!! Form::open(array('route' => 'permiso_profesors.store','method'=>'POST')) !!}
        {!! Form::token() !!}
            @include('permiso_profesors._form')
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Crear Permiso</button>
            </div>
        {!! Form::close() !!}
    </div>



@endsection
