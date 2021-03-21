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
        @if(Session::has('message'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
            </div>
        @endif
        {!! Form::model($permiso_profesor, ['method' => 'PATCH','route' => ['permiso_profesors.update', $permiso_profesor]]) !!}

        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Fecha de Inicio:</strong>
            {!! Form::date('fecha_inicio',null,['class' => 'form-control','readonly']) !!}
        </div>
        <div class="form-group">
            <strong>Fecha Fin:</strong>
            {!! Form::date('fecha_fin', null, array('class' => 'form-control','readonly')) !!}
        </div>
        <div class="form-group">
            <strong>Hora Inicio:</strong>
            {!! Form::time('hora_inicio', \Carbon\Carbon::now(), array('class' => 'form-control','readonly')) !!}
        </div>
        <div class="form-group">
            <strong>Hora Fin:</strong>
            {!! Form::time('hora_fin', null, array('class' => 'form-control','readonly')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Tipo Permiso:</strong>
            {!! Form::text('tipo_permiso', null, array('placeholder' => 'Descripcion','class' => 'form-control','readonly')) !!}

        </div>
        <div class="form-group">
            <strong>Descripción:</strong>
            {!! Form::text('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control','readonly')) !!}
        </div>
        <div class="form-group">
            <strong>Observación de la desaprobación:</strong>
            {!! Form::text('desaprobacion', null, array('placeholder' => 'Descripcion','class' => 'form-control','readonly')) !!}
        </div>
    </div>
    {!! Form::close() !!}


</div>
@endsection

