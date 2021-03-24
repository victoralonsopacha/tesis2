@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Editar Permiso</div>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('permiso_profesors.shows') }}">Regresar</a>
        </div>
        <br><br>

        {!! Form::model($permiso_profesor, ['method' => 'PATCH','accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data','route' => ['permiso_profesors.update', $permiso_profesor]]) !!}
        {!! Form::token() !!}

            <div class="row">
                @include('permiso_profesors._form')

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>

                {!! Form::close() !!}

        <br>

    </div>
@endsection
