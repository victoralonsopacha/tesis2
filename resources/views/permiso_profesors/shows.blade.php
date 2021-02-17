@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>PERMISOS</h1>



    <div class="row">
        {!! Form::open(['route' => 'permiso_profesors.buscar', 'method'=>'POST']) !!}
        {!! Form::token() !!}
        <div class="col-sm-3 col-lg-3">
            {!! Form::date('fecha_inicio',null,['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3 col-lg-3">
            {!! Form::date('fecha_fin',\Carbon\Carbon::now(),['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3 col-lg-3">
            {!! Form::submit('Buscar'); !!}
        </div>
        {{ Form::close() }}
    </div><!-- /.row -->
    @if($permisos->isEmpty())
        <h4>No existen registros</h4>
    @else
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
        @endif
        <br>
        <a href="{{ route('permiso_profesors.create') }}" class="btn btn-info">Crear Nuevo Permiso</a>
        <br><br>
        <div class="panel panel-default">
        <div class="panel-heading">Permisos</div>
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Cedula</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permisos as $permiso)
                <tr>
                    <td>{!! $permiso->cedula !!}</td>
                    <td>{!! $permiso->hora_inicio !!}</td>
                    <td>{!! $permiso->hora_fin !!}</td>
                    <td>{!! $permiso->fecha_inicio!!}</td>
                    <td>{!! $permiso->fecha_fin!!}</td>
                    <td>{!! $permiso->estado !!}</td>
                    <td>
                        <a href="{{ route('permiso_profesors.edit', $permiso) }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                    <td>
                        <a href="#">Ver Justificación</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        </div>

@endsection

