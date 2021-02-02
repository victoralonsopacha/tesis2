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


                <form method="POST" action="{{ route('calculo_tiempos.total2', $user) }}">
                    @csrf
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">INICIO</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="fecha_inicio" value="'fecha_inicio'">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">FIN</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="fecha_fin" value="'fecha_fin'">
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><a class="nav-link" >Calcular tiempos</a></button>

                </form>
                
            </li>

          </ul>
        </div>
      </div>




      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-success"><a class="nav-link" href="{{ route('calculo_tiempos.permisos', $user) }}">Permisos</a></button>
        <button type="submit" class="btn btn-success"><a class="nav-link" href="{{ route('calculo_tiempos.calcular', $user) }}">Horas a reponer</a></button>
      </div>


@endsection

