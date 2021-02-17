@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h2>PERMISOS APROBADOS</h2>





    @if($permisosl->isEmpty())
        <div class="alert alert-danger" role="alert">No existen registros actualmente</div>
        <a href="/permiso_profesors/principal">Regresar a menu Permisos</a>
    @else
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
                        <td>{!! $permisoItem->fecha_fin !!}</td>
                        <td>{!! $permisoItem->estado !!}</td>
                        <td>
                            <a href="{{ route('permiso_profesors.edit', $permisoItem) }}">Editar</a>
                        </td>
                        <td>
                            <a href="#">Justificación</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>



@endsection
