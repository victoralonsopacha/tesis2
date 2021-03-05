@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>GESTIONAR PERMISOS</h1>
    <h4>Este modulo permite gestionar la justificación de todos los permisos creados por los profesores</h4>
<br>
    <form method="POST" action="{{route('permisos.find')}}" class="form-inline my-2 my-lg-0 float-right">
        @csrf
        <input name="buscador" class="form-control me-2" type="search" placeholder="Ingrese una cédula" aria-label="Search">
        <select name="estado">
            <option {{old('estado')=="0"? 'selected':''}} value="0">Pendiente</option>
            <option {{old('estado')=="1"? 'selected':''}} value="1">Aprobado</option>
            <option {{old('estado')=="2"? 'selected':''}} value="2">Desaprobado</option>
        </select>
        <button class="btn btn-success" type="submit">Buscar</button>
    </form>



    {{--@auth--}}
    <!--
    <a href="{{ route('permisos.create') }}">Crear Permiso</a>
    -->
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

                <table class="table table-responsive-md text-center">
                    <thead class="thead-tomate">
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
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
                            <td>{!! $permisoItem->name !!}</td>
                            <td>{!! $permisoItem->last_name !!}</td>
                            <td>{!! $permisoItem->hora_inicio !!}</td>
                            <td>{!! $permisoItem->hora_fin !!}</td>
                            <td>{!! $permisoItem->fecha_inicio!!}</td>
                            <td>{!! $permisoItem->fecha_fin!!}</td>
                            @if($permisoItem->estado == '1')
                                <td><span class="label label-success">Aprobado</span></td>
                            @elseif($permisoItem->estado == '2')
                                <td><span class="label label-warning">Desaprobado</span></td>
                            @else($permisoItem->estado == '0')
                                <td><span class="label label-danger">Pendiente</span></td>
                            @endif
                            <td>
                                <a href="{{ route('permisos.justificar', $permisoItem) }}">Justificar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>




    </div>

@endsection
