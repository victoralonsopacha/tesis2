@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>MIS PERMISOS</h1>
    <div class="pull-left">
        <a href="{{ route('permiso_profesors.index', ['permiso_profesor' => $permiso_profesor=auth()->user()->cedula]) }}"
           class="btn btn-success">Permisos Aprobados</a>
        <a href="{{ route('permiso_profesors.index1', ['permiso_profesor' => $permiso_profesor=auth()->user()->cedula]) }}"
           class="btn btn-info">Permisos Reprobados</a>
    </div>
    <div class="pull-right">
        <a class="btn btn-warning" href="{{ route('permiso_profesors.create')}}">Crear Nuevo Permiso</a>
    </div>
    <br><br><br>
    @include('partials.validation-errors')
    <div class="row">
        {!! Form::open(['route' => 'permiso_profesors.buscar', 'method'=>'POST']) !!}
        {!! Form::token() !!}
        <div class="col-sm-1 col-lg-1">
            <strong>De:</strong>
        </div>
        <div class="col-sm-3 col-lg-3">
            {!! Form::date('fecha_inicio',null,['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-1 col-lg-1">
            <strong>Hasta:</strong>
        </div>
        <div class="col-sm-3 col-lg-3">
            {!! Form::date('fecha_fin',\Carbon\Carbon::now(),['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3 col-lg-3">
        <button type="submit" class="btn btn-success">Buscar</button>
        </div>
        {{ Form::close() }}
    </div>
    <!-- /.row -->
    @if($permisos->isEmpty())
        <h4>No existen registros</h4>
    @else
        @if(Session::has('message'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
        @endif
        <br>
        <div class="panel panel-default">
        <div class="panel-heading">Permisos</div>
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Nr.</th>
                    <th>Fecha Inicio</th>
                    <th>Hora Inicio</th>
                    <th>Fecha Finalizacion</th>
                    <th>Hora Finalizacion</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permisos as $permiso)
                <tr>
                    <td>{!! $i++ !!}</td>
                    <td>{!! $permiso->fecha_inicio!!}</td>
                    <td>{!! $permiso->hora_inicio !!}</td>
                    <td>{!! $permiso->fecha_fin!!}</td>
                    <td>{!! $permiso->hora_fin !!}</td>
                    @if($permiso->estado == '0')
                    <td><span class="label label-danger">Pendiente</span></td>
                        <td>
                            <a href="{{ route('permiso_profesors.edit', $permiso) }}" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>
                    @elseif($permiso->estado == '1')
                        <td><span class="label label-success">Aprobado</span></td>
                        <td>
                            <a href="{{ route('permiso_profesors.show', $permiso) }}" class="btn btn-xs btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    @elseif($permiso->estado == '2')
                        <td><span class="label label-info">Desaprobado</span></td>
                        <td>
                            <a href="{{ route('permiso_profesors.show', $permiso) }}" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        </div>

@endsection

