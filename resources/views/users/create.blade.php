@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <h2>Crear Nuevo Usuario</h2>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('users.activos') }}">Regresar</a>
            </div>
        </div>
    </div>
    @include('partials.validation-errors')
    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
        {!! Form::token() !!}
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nombres:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Nombres','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Apellidos:</strong>
                {!! Form::text('last_name', null, array('placeholder' => 'Apellidos','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Cedula:</strong>
                {!! Form::text('cedula', null, array('placeholder' => 'Cedula','class' => 'form-control')) !!}
            </div>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <strong>Contraseña:</strong>
                {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <strong>Confirmar contraseña:</strong>
                {!! Form::password('password_confirmation', array('placeholder' => 'Confirmar contraseña','class' => 'form-control')) !!}
            </div>

        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Correo:</strong>
                {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Tipo Relacion Laboral:</strong>
                {!! Form::select('tipo_relacion_laboral[]',$tipo_relacion_laboral, null,['class' => 'form-control']); !!}
            </div>
            <div class="form-group">
                <strong>Rol:</strong>
                {!! Form::select('roles', $roles,[], array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Fecha de Ingreso:</strong>
                {!! Form::date('fecha_ingreso', null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success">Aceptar</button>
        </div>
    </div>
    {!! Form::close() !!}

    </div>
@endsection

