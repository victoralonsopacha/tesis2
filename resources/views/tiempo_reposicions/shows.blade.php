@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Propuestas de Reposiciones de Atrasos</div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <label for="">Atrasos Total: </label>
                {!! $totalHoras !!}
            </div>
            <div class="col-md-3">
            <label for="">Reposiciones Total: </label>
                {!!$totalReposicion!!}                
            </div>
            <div class="col-md-3">
            <label for="">Reposiciones Total: </label>
                @php
                $horaInicio = new DateTime($totalHoras);
                $horaTermino = new DateTime($totalReposicion);

                $interval = $horaInicio->diff($horaTermino);
                echo $interval->format('%H:%i:%s');
                @endphp 
            </div>
        </div>
                  

        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b>Usuario: {{auth()->user()->name.' '.auth()->user()->last_name}}</b>
            </div>
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Nr.</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i=1;
                @endphp
                @foreach($tiempos as $tiempo)
                    <tr>
                        <td>{!! $i++ !!}</td>
                        <td>{!! $tiempo->fecha !!}</td>
                        <td>{!! $tiempo->horas !!}</td>
                        @if($tiempo->estado == 1)
                            <td><span class="label label-success">Aprobado</span></td>
                        @elseif($tiempo->estado == 2)
                            <td><span class="label label-info">Rechazado</span></td>
                        @elseif($tiempo->estado == 0)
                            <td><span class="label label-danger">Pendiente</span></td>
                        @endif
                    </tr>
                    @endforeach                    
                </tbody><!--/.tbody-->
            </table><!--/.table-->
            <nav aria-label="..." class="text-center">
                {{$tiempos->links()}}
            </nav>
        </div><!--/.panel-->
    </div><!--/.container-->
@endsection


