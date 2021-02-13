@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>HORAS TOTALES</h1>


    <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">


                @foreach($consulta2 as $itemconsulta)
                @endforeach
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Cedula</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label"></label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Apellido</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label"></label>
                    </div>
                </div>




                @foreach ($consulta as $itemconsulta2)
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">HORAS TOTALES</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta2->tiempo_trabajado}}">
                    </div>
                </div>
                @endforeach


                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">DIAS TOTALES</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="5 dias">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">ATRASOS</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="3">
                    </div>
                </div>
            </li>

          </ul>
        </div>
      </div>


@endsection

