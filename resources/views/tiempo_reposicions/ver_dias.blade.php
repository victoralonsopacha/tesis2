@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center"><b>Dias de Reposicion</b></div>
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
        @include('partials.validationError')
        <div class="panel panel-default">
            <!-- Default panel contents -->

            <div class="panel-heading">Usuario: {{$user->name.' '.$user->last_name}}</div>
            <!-- Table -->

            <table class="table table-responsive-md text-center">
                
                <tr>
                    <th>Nr.</th>
                    <th>Fecha</th>
                    <th>Hora Propuesta</th>
                    <th>Estado</th>
                    <th COLSPAN=2>Acción</th>
                </tr>
                
                @php
                $i=1;
                @endphp
                @foreach ($consulta as $reposicion)
                
                    <tr>
                        <td>{{$i++ }}</td>
                        <td>{{ $reposicion->fecha }}</td>
                        <td>{{ $reposicion->horas }}</td>
                        @if($reposicion->estado == 1)
                            <td><span class="label label-warning">Aprobado</span></td>
                        @elseif($reposicion->estado == 2)
                            <td><span class="label label-info">Reprobado</span></td>
                        @endif
                        @if($reposicion->estado == 0)
                        <td></td>
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
                                    <button class="btn btn-danger btn-xs" onclick="return confirm('¿Seguro que deseas rechazar esta solicitud?')">
                                        <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>Rechazar</button>
                                </form>
                            </td>
                        @endif    
                        

                    </tr>
            @endforeach
        </table>
            <nav aria-label="..." class="text-center">
                {{$consulta->links()}}
            </nav>
        </div><!--/.panel-default-->
    </div><!--/.container-fluid-->

@endsection
