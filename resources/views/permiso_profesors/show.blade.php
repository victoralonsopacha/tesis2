@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Mi Permiso</div>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('permiso_profesors.shows')}}">Regresar</a>
        </div>
        <br><br>
        @include('partials.validationMessage')
        {!! Form::model($permiso_profesor, ['method' => 'PATCH','route' => ['permiso_profesors.update', $permiso_profesor]]) !!}
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Fecha de Inicio:</strong>
                {!! Form::date('fecha_inicio',null,['class' => 'form-control','readonly']) !!}
            </div>
            <div class="form-group">
                <strong>Hora Inicio:</strong>
                {!! Form::time('hora_inicio', \Carbon\Carbon::now(), array('class' => 'form-control','readonly')) !!}
            </div>
            <div class="form-group">
                <strong>Fecha Fin:</strong>
                {!! Form::date('fecha_fin', null, array('class' => 'form-control','readonly')) !!}
            </div>

            <div class="form-group">
                <strong>Hora Fin:</strong>
                {!! Form::time('hora_fin', null, array('class' => 'form-control','readonly')) !!}
            </div>
            <div class="form-group">
                <strong>Tipo Permiso:</strong>
                {!! Form::text('tipo_permiso', null, array('class' => 'form-control','readonly')) !!}
            </div>
            @if($permiso_profesor->estado == 1)
                <div class="form-group">
                    <strong>Estado:</strong>
                    {!! Form::text('Aprobado', null, array('placeholder' => 'Aprobado','class' => 'form-control','readonly')) !!}
                </div>
            @endif

            @if($permiso_profesor->estado == 2)
                <div class="form-group">
                    <strong>Estado:</strong>
                    {!! Form::text('Aprobado', null, array('placeholder' => 'Reprobado','class' => 'form-control','readonly')) !!}
                </div>
                <div class="form-group">
                    <strong>Observación del Inspector:</strong>
                    {!! Form::text('desaprobacion', null, array('class' => 'form-control','readonly')) !!}
                </div>
            @endif
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Mi Observación:</strong>
                {!! Form::text('descripcion', null, array('class' => 'form-control','readonly')) !!}
            </div>
            <div class="form-group">
                <strong>Archivo Justificación:</strong><br>
                <img src="{{asset("$permiso_profesor->file")}}" alt="" style="width:250px;height:250px;">
            </div>

    {!! Form::close() !!}


</div>
@endsection

