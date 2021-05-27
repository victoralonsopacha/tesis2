@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Crear Usuario</div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('users.activos') }}">Regresar</a>
                </div>
            </div>
        </div>
        @include('partials.validation-errors')
        <form action="{{route('users.store')}}" method="POST" id="validarFormulario">
        @csrf
            <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nombres:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Nombres','class' => 'form-control','required')) !!}
                </div>
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    {!! Form::text('last_name', null, array('placeholder' => 'Apellidos','class' => 'form-control','required')) !!}
                </div>
                <div class="form-group">
                    <strong>Cédula:</strong>
                    {!! Form::text('cedula', null, array('placeholder' => 'Cedula','class' => 'form-control','required')) !!}
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <strong>Contraseña:</strong>
                    {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control', 'required')) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <strong>Confirmar contraseña:</strong>
                    {!! Form::password('password_confirmation', array('placeholder' => 'Confirmar contraseña','class' => 'form-control','required')) !!}
                </div>

            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Correo:</strong>
                    {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control','required')) !!}
                </div>
                <div class="form-group">
                    <strong>Tipo Relación Laboral:</strong>
                    {!! Form::select('tipo_relacion_laboral[]',$tipo_relacion_laboral, null,['class' => 'form-control','required']); !!}
                </div>
                <div class="form-group">
                    <strong>Jornada:</strong>
                    {!! Form::select('jornada[]', $jornada, null,array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Rol:</strong>
                    {!! Form::select('roles', $roles,[], array('class' => 'form-control')) !!}
                </div>
                <div class="form-group" {{ $errors->has('fecha_ingreso') ? ' has-error' : '' }}>
                    <strong>Fecha de Ingreso:</strong>
                    {!! Form::date('fecha_ingreso', null,['class' => 'form-control','required']) !!}
                    @if ($errors->has('fecha_ingreso'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fecha_ingreso') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Aceptar</button>
            </div>
        </div>
        </form>

    </div><!--/..container-fluid-->

    <script>

    </script>
@endsection

