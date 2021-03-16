@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center"><b>PERMISOS</b></div>
        </div>
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
    @include('partials.validationMessage')
    @if($permisosl->isempty())
            <div class="alert alert-danger text-center" role="alert">No existen registros actualmente</div>
    @else
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Permisos</div>
        <!-- Table -->
        <table class="table table-responsive-md text-center">
            <tbody>
                <thead class="thead-tomate">
                <tr>
                    <th>Nr.</th>
                    <th>Nombres y Apellidos</th>
                    <th>Cedula</th>
                    <th>Fecha Inicio</th>
                    <th>Hora Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Hora Fin</th>
                    <th>Estado</th>
                    <th>Justificar</th>
                </tr>
                </thead>
            </tbody>
            @php
                $i=1;
            @endphp
            @foreach($permisosl as $permisoItem)
                <tr>
                    <td>{!! $i++ !!}</td>
                    <td>{!! $permisoItem->name.' '.$permisoItem->last_name!!}</td>
                    <td>{!! $permisoItem->cedula !!}</td>
                    <td>{!! $permisoItem->fecha_inicio!!}</td>
                    <td>{!! $permisoItem->hora_inicio !!}</td>
                    <td>{!! $permisoItem->fecha_fin!!}</td>
                    <td>{!! $permisoItem->hora_fin !!}</td>
                    @if($permisoItem->estado == 1)
                        <td><span class="label label-success">Aprobado</span></td>
                    @elseif($permisoItem->estado == 2)
                        <td><span class="label label-warning">Reprobado</span></td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('permisos.justificar', $permisoItem) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>
                    @else($permisoItem->estado == '0')
                        <td><span class="label label-danger">Pendiente</span></td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('permisos.justificar', $permisoItem) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody><!--/.table-->
        </table><!--/.table-->
        <nav aria-label="..." class="text-center">
            {{$permisosl->links()}}
        </nav>
    </div><!--/.panel-->
    @endif
    </div><!--/.container-fluid-->

@endsection
