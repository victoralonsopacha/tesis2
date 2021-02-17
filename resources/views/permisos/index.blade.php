@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>GESTIONAR PERMISOS</h1>

    <form class="form-inline my-2 my-lg-0 float-right">
        <input name="buscador" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>

    {{--@auth--}}
    <a href="{{ route('permisos.create') }}">Crear Permiso</a>
    {{--@endauth--}}
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Permisos</div>
        <!-- Table -->
        @if($permisosl->isEmpty())
            <p>No existen registros</p>
        @else
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Cedula</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($permisosl as $permisoItem)
                    <tr>
                        <td>{!! $permisoItem->cedula !!}</td>
                        <td>{!! $permisoItem->hora_inicio !!}</td>
                        <td>{!! $permisoItem->hora_fin !!}</td>
                        <td>{!! $permisoItem->fecha_inicio!!}</td>
                        <td>{!! $permisoItem->fecha_fin!!}</td>
                        @if($permisoItem->estado == '1')
                            <td><span class="label label-success">Aprobado</span></td>
                        @elseif($permisoItem->estado == '0')
                            <td><span class="label label-warning">Desaprobado</span></td>
                        @else($permisoItem->estado == 'null')
                            <td><span class="label label-danger">Pendiente</span></td>
                        @endif
                        <td>
                            <a href="{{ route('permisos.justificar', $permisoItem) }}">Justificar</a>
                        </td>
                        <td>
                            <a href="{{ route('permisos.edit', $permisoItem) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection
