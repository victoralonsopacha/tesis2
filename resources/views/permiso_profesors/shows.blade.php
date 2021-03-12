@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Mis Permisos</div>
    </div>
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
            <form method="POST" id="formulariofecha" action="{{ route('permiso_profesors.buscar') }}">
                @csrf
                <div class="col-sm-1 col-lg-1">
                    <strong>De:</strong>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <input type="date" class="form-control" id='fecha_inicio' name="fecha_inicio" value="'fecha_inicio'">
                </div>
                <div class="col-sm-1 col-lg-1">
                    <strong>Hasta:</strong>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <input type="date" class="form-control" id='fecha_fin' name="fecha_fin" value="'fecha_fin'">
                </div>
                <div class="col-sm-3 col-lg-3">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </form>
        </div><!-- /.row -->
        <br>
    @include('partials.validationMessage')

    @if($permisos->isEmpty())
        <div class="alert alert-danger" role="alert">No existen registros actualmente</div>
    @else
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
                @php
                $i=1;
                @endphp
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
                        <td><span class="label label-info">Reprobado</span></td>
                        <td>
                            <a href="{{ route('permiso_profesors.show', $permiso) }}" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
        </div><!--/.div panel-->
        @endif
    </div><!--/.container fluid-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("formulariofecha").addEventListener('submit', validarFechas);
        });

        function validarFechas(evento) {
            evento.preventDefault();
            var fecha_inicio = $("#fecha_inicio").val();
            var fecha_fin =  $("#fecha_fin").val();
            var inicio = new Date(fecha_inicio);
            var fin = new Date(fecha_fin);
            if(fecha_inicio.length == 0){
                alert("Debe ingresar una fecha de inicio");
                return;
            }
            if(fecha_fin.length == 0){
                alert("Debe ingresar una fecha final");
                return;
            }

            if(inicio > fin){
                alert("La fecha fin no puede ser menor");
                return;
            }
            this.submit();
        }
    </script>
@endsection

