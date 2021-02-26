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
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nombres:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    {!! Form::text('last_name', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Cedula:</strong>
                    {!! Form::text('cedula', null, array('placeholder' => 'Cedula','class' => 'form-control','readonly')) !!}
                </div>
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','readonly')) !!}
                </div>
                <div class="form-group">
                    <strong>Tipo Relacion Laboral:</strong>
                    {!! Form::select('tipo_relacion[]', $tipo_relacion,'',['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    <strong>Rol:</strong>
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','readonly')) !!}
                </div>
                <div class="form-group">
                    <strong>Fecha de Ingreso:</strong>
                    {!! Form::date('fecha_ingreso', null,['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
        {!! Form::close() !!}

    </div>


@endsection
