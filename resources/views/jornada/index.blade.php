@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align: center">Jornada</div>
    </div>
    @if($horarios->isEmpty())
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="alert alert-warning" role="alert">
                                No existen registros !!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @else
                @foreach($horarios as $horario)
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label($horario->hora_entrada) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label($horario->hora_salida) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label($horario->tipo) !!}
                        </div>
                    </div>
                @endforeach

    @endif
    <!--Seccion Validacion Fechas-->
        <br>
        <div class="row">
            {!! Form::open(['route' => 'jornada.buscar', 'method'=>'POST']) !!}
            {!! Form::token() !!}


            <div class="col-sm-3 col-lg-3">
                {!! Form::date('fecha_inicio',null,['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-3 col-lg-3">
                {!! Form::date('fecha_fin',\Carbon\Carbon::now(),['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-3 col-lg-3">
                {!! Form::submit('Buscar'); !!}
            </div>
            {{ Form::close() }}
        </div>
        <br>
        <div class="panel panel-default">
            <table class="table table-responsive-md">
                <thead class="thead-tomate">
                <tr>
                    <th>Año</th>
                    <th>Mes</th>
                    <th>Dia</th>
                    <th>Fecha</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                    <th>Tiempo Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jornadas as $jornada)
                    <tr>
                        <td>{!! $jornada->anio!!}</td>
                        <td>{!! $jornada->mes_nombre!!}</td>
                        <td>{!! $jornada->dia!!}</td>
                        <td>{!! $jornada->fecha!!}</td>
                        <td>{!! $jornada->hora_entrada!!}</td>
                        <td>{!! $jornada->hora_salida!!}</td>
                        <td>{!! $jornada->tiempo_total!!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
