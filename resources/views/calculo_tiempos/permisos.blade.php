@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>PERMISOS TOTALES</h1>


    <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Cedula</label>
                    <div class="col-sm-6">
                        @foreach ($consulta as $itemconsulta)
                            <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta->cedula }}</label>


                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta->name }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">HORAS TOTALES</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="39:34:12">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">DIAS TOTALES</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="5 dias">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">PERMISOS APROBADOS</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta->permisos}}">

                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    @foreach ($consulta2 as $itemconsulta2)
                    <label for="staticEmail" class="col-sm-5 col-form-label">PERMISOS SIN APROBAR</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta2->permisos}}">
                    </div>
                    @endforeach
                </div>
            </li>

          </ul>
        </div>
      </div>


@endsection

