@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center"><b>Permisos</b></div>
        </div>
        <h4>Este módulo permite aprobar o desaprobar los permisos solicitados</h4>
        <br>
        <form method="POST" action="{{route('permisos.find')}}" class="form-inline my-2 my-lg-0 pull-right">
            @csrf
            <strong>Buscar por:</strong>
            <div class="form-group">
                {!! Form::select('estado[]',$estado, null,['class' => 'form-control']); !!}
            </div>
            <input name="buscador" class="form-control me-2" type="number" placeholder="Cédula" aria-label="Search">
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
                        <th>Cédula</th>
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
                        @foreach($users as $user)
                            @if($permisoItem->cedula == $user->cedula)
                                <tr>
                                    <td>{!! $i++ !!}</td>
                                    <td>{!! $user->name.' '.$user->last_name !!}</td>
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
                                            <a class="btn btn-primary btn-xs" href="{{ route('permisos.justificar', $permisoItem->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach
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
