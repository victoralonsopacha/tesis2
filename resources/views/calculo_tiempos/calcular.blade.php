@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Calculo de Horas</div>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('calculo_tiempos.index') }}">Regresar</a>
        </div><br><br>
        <div class="text-center">
            <h3><b>USUARIO</b></h3>
            <h4>
                <p class="text-uppercase">
                    Nombres y Apellidos:{{ ' '.$user->name.' '.$user->last_name }}
                </p>
                <p class="text-uppercase">
                    Cedula:{{ ' '.$user->cedula }}
                </p>
            </h4>
        </div>
        <br>
        @include('partials.validation-errors')

        <form method="POST" action="{{ route('calculo_tiempos.total2', $user) }}" class="form-inline text-center">
            @csrf
            <div class="form-group">
                <label>FECHA INICIO:</label>
                <input type="date" class="form-control" name="fecha_inicio" value="'fecha_inicio'">
            </div>
            <div class="form-group">
                <label>FECHA FIN:</label>
                <input type="date" class="form-control" name="fecha_fin" value="'fecha_fin'">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success">Calcular tiempos</button>
            </div>
        </form>


    </div>
@endsection
