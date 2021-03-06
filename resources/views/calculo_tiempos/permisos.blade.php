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
                        @foreach ($consulta5 as $itemconsulta5)
                            <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta5->cedula }}</label>


                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta5->name }}</label>
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
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta5->permisos}}">

                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    @foreach ($consulta6 as $itemconsulta6)

                    @endforeach
                    <label for="staticEmail" class="col-sm-5 col-form-label">PERMISOS SIN APROBAR</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta6->permisos}}">
                    </div>
                </div>
            </li>

          </ul>
        </div>
      </div>


@endsection

