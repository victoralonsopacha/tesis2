@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>CALCULO DE HORAS</h1>


    <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Profesor</a>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cedula</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">{{ $user->cedula }}</label>
                    </div>
                </div>      
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">{{ $user->name }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Apellido</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">{{ $user->last_name }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cargo</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">{{ $user->cargo }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">INICIO</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="date" value="date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">FIN</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="date" value="date">
                    </div>
                </div>
            </li>

          </ul>
        </div>
      </div>




      <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-success"><a class="nav-link active" href="{{ route('calculo_tiempos.total', $user) }}">Horas Totales</a></button>
        <button type="button" class="btn btn-success"><a class="nav-link" href="{{ route('calculo_tiempos.calcular', $user) }}">Vacaciones</a></button>
        <button type="button" class="btn btn-success"><a class="nav-link disabled" href="{{ route('calculo_tiempos.calcular', $user) }}">Horas a reponer</a></button>
      </div>


@endsection

