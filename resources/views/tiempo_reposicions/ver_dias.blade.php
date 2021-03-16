@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center"><b>DIAS DE REPOSICION</b></div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('tiempo_reposicions.index_inspector') }}">Regresar</a>
                </div>
            </div>
        </div>
        <br>
        @include('partials.validationMessage')
        <div class="panel panel-default">
            <!-- Default panel contents -->

            <div class="panel-heading">Usuario: {{$user->name.' '.$user->last_name}}</div>
            <!-- Table -->

            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Nr.</th>
                    <th>Hora Propuesta</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                </tr>
                </thead>
                @php
                $i=1;
                @endphp
                @foreach ($consulta as $reposicion)
                <tbody>
                    <tr>
                        <td>{{$i++ }}</td>
                        <td>{{ $reposicion->fecha }}</td>
                        <td>{{ $reposicion->horas }}</td>
                        @if($reposicion->estado == 0)
                            <td>
                                <form action="{{route('tiempo_reposicions.active', $reposicion->id)}}" method="POST">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-success btn-xs">
                                        <span aria-hidden="true" class="glyphicon glyphicon-ok"></span>Aceptar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('tiempo_reposicions.desactive', $reposicion->id)}}" method="POST">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-danger btn-xs" onclick="return confirm('¿Seguro que deseas desactivar este usuario?')">
                                        <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>Rechazar</button>
                                </form>
                            </td>
                        @elseif($reposicion->estado == 1)
                            <td><span class="label label-danger">Aprobado</span></td>
                        @elseif($reposicion->estado == 2)
                            <td><span class="label label-danger">Aprobado</span></td>
                        @endif

                </tbody>



            @endforeach

        </table>
        </div><!--/.panel-default-->
    </div><!--/.container-fluid-->

@endsection
