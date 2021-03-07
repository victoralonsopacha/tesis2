@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align: center">Jornada</div>
    </div>

    <!--Seccion Validacion Fechas-->
        <br>
        @include('partials.validation-errors')
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
            <div class="table-responsive">
            <table class="table table-responsive-md">
                <thead class="thead-tomate">
                <tr>
                    <th>Nr.</th>
                    <th>Año</th>
                    <th>Mes</th>
                    <th>Dia</th>
                    <th>Fecha</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                    <th>Jornada Diaria</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i=1;
                @endphp
                @foreach($jornadas as $jornada)

                    <tr>
                        <td>{!! $i++ !!}</td>
                        <td>{!! $jornada->anio!!}</td>
                        <td>{!! $jornada->mes_nombre!!}</td>
                        <td>{!! $jornada->dia!!}</td>
                        <td>{!! $jornada->fecha!!}</td>
                        <td>{!! $jornada->hora_entrada!!}</td>
                        <td>{!! $jornada->hora_salida!!}</td>
                        <td>{!! $jornada->tiempo_total!!}</td>
                    </tr>
                @endforeach
                <tr>
                </tr>
                </tbody>
            </table>
                <nav aria-label="..." class="text-center">
                    {{$jornadas->links()}}
                </nav>

            </div>
        </div>
    </div>
@endsection
