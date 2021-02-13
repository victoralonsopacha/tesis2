@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">Atrasos</div>
        </div>
        <!--Seccion Validacion Fechas-->
        <div class="row">
            {!! Form::open(['route' => 'atrasos.buscar', 'method'=>'POST']) !!}
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
                    <th>Fecha</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                    <th>Retraso de Jornada</th>
                </tr>
                </thead>
                <tbody>
                @foreach($atrasos as $atraso)
                    <tr>
                        <td>{!! $atraso->fecha!!}</td>
                        <td>{!! $atraso->hora_entrada!!}</td>
                        <td>{!! $atraso->hora_salida!!}</td>
                        <td>{!! $atraso->retraso_jornada!!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><!--container-->
@endsection

