@extends('layouts.app')
@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear Nuevo Usuario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.activos') }}">Regresar</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
            <div class="form-group">
                <strong>Contraseña:</strong>
                {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                <strong>Confirmar contraseña:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirmar contraseña','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Correo:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Tipo Relacion Laboral:</strong>
                {!! Form::text('tipo_relacion_laboral', null, array('placeholder' => 'Tipo Relacion Laboral','class' => 'form-control')) !!}
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
            <button type="submit" class="btn btn-outline-success">Aceptar</button>
        </div>
    </div>
    {!! Form::close() !!}

    </div>
@endsection

