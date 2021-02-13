@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>Timbrar Permiso</h1>

    @include('partials.validation-errors')
    {!! Form::open(['route' => 'timbrada_permisos.store', 'method'=>'POST']) !!}
    {!! Form::token() !!}
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Cedula del usuario</label>
        <div class="col-sm-2">
        {!! Form::text('cedula',$cedula=auth()->user()->cedula,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">hora</label>
        <div class="col-sm-2">
            {!! Form::time('hora',\Carbon\Carbon::now(),['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
        <div class="col-sm-2">
            {!! Form::date('fecha',\Carbon\Carbon::now(),['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-6">
            {!! Form::text('observacion',$timbrada_permiso->observacion,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tipo Permiso</label>
        <div class="col-sm-6">
            {!! Form::select('tipo_permiso', array('salida' => 'Salida', 'entrada' => 'Entrada')) !!}
        </div>
    </div>
    {!! Form::submit('Timbrar'); !!}
    {{ Form::close() }}

@endsection
