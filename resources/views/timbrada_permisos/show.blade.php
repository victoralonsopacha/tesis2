@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Timbrar Permiso</div>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('timbrada_permisos.index') }}">Timbrar Permisos</a>
        </div>
        <br><br>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
            </div>
        @endif
        @if($timbradas->isempty())
            @include('partials.validationAlertempty')
        @else
            <div class="panel panel-default">
                <table class="table table-responsive-md text-center">
                    <thead>
                    <tr>
                        <th>Nr.</th>
                        <th>Cédula</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Tipo Permiso</th>
                        <th>Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($timbradas as $timbrada)
                        <tr>
                            <td>{!! $timbrada->id !!}</td>
                            <td>{!! $timbrada->cedula !!}</td>
                            <td>{!! $timbrada->fecha !!}</td>
                            <td>{!! $timbrada->hora!!}</td>
                            <td>{!! $timbrada->tipo_permiso!!}</td>
                            <td>{!! $timbrada->descripcion!!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table><!--/.table-->
            </div><!--/.panel-->
        @endif
    </div><!--/.container-fluid-->
@endsection
