@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Mi Informacion</div>
    </div>
        @include('partials.validationMessage')
        {!! Form::model($user, ['method' => 'POST','route' => ['profesor.edit', $user->id]]) !!}
        <div class="panel panel-default">
            <table class="table">
                <tbody>
                <tr>
                    <td><strong class="col-md-6">Nombres:</strong></td>
                    <td><label class="col-md-6">{!! auth()->user()->name." ".auth()->user()->last_name !!}</label></td>
                </tr>
                <tr>
                    <td><strong class="col-md-6">Correo:</strong></td>
                    <td><label class="col-md-6">{!! auth()->user()->email !!}</label></td>
                </tr>
                <tr>
                    <td><label class="col-md-6">Cedula:</label></td>
                    <td><label class="col-md-6">{!! auth()->user()->cedula !!}</label></td>
                </tr>
                <tr>
                    <td><label class="col-md-6">Relacion Laboral:</label></td>
                    <td><label class="col-md-6">{!! auth()->user()->tipo_relacion_laboral !!}</label></td>
                </tr>
                <tr>
                    <td><label class="col-md-6">Fecha de Ingreso:</label></td>
                    <td><label class="col-md-6">{!! auth()->user()->fecha_ingreso !!}</label></td>
                </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-info">Editar Información</button>
        {!! Form::close() !!}
    </div>
@endsection

