@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h4>Este modulo permite aprobar o desaprobar los permisos solicitados</h4>
    <br>
    <form method="POST" action="{{route('permisos.findRequest')}}" class="form-inline my-2 my-lg-0 pull-right">
        @csrf
        <input name="buscador" class="form-control me-2" type="number" placeholder="Ingrese una cédula" aria-label="Search">
        <button class="btn btn-success" type="submit">Buscar</button>
    </form>

    <form method="POST" action="{{route('permisos.findRequest')}}" class="form-inline my-2 my-lg-0 pull-right">
        @csrf
        <select name="estado">
            <option {{old('estado')=="0"? 'selected':''}} value="0">Pendiente</option>
            <option {{old('estado')=="1"? 'selected':''}} value="1">Aprobado</option>
            <option {{old('estado')=="2"? 'selected':''}} value="2">Desaprobado</option>
        </select>
        <button class="btn btn-success" type="submit">Buscar</button>
    </form>
    <br><br>

    {{--@auth--}}
    <!--
    <a href="{{ route('permisos.create') }}">Crear Permiso</a>
    -->
    {{--@endauth--}}
    @include('partials.validationMessage')

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
                            @elseif($permisoItem->estado == '2' )
                                <td><span class="label label-warning">Desaprobado</span></td>
                                <td>
                                    <a href="{{ route('permisos.justificar', $permisoItem) }}">Justificar</a>
                                </td>
                            @else($permisoItem->estado == '0')
                                <td><span class="label label-danger">Pendiente</span></td>
                                <td>
                                    <a href="{{ route('permisos.justificar', $permisoItem) }}">Justificar</a>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>




    </div>

@endsection
