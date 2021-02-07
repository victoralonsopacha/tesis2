@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
    <h1>HORAS TOTALES</h1>
@endsection


@section('main-content')
    <h1>HORAS TOTALES</h1>


    <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                

                @foreach ($consulta2 as $itemconsulta2)
                    
                @endforeach
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Cedula</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta2->cedula }}</label>
                    </div>
                </div>      
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta2->nombre }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Apellido</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta2->apellido }}</label>
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
                

                @foreach ($consulta4 as $itemconsulta4)
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">DIAS TOTALES</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta4->num_dias}} DIAS">
                    </div>
                </div>
                @endforeach
                

                @foreach ($consulta3 as $itemconsulta3)
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">ATRASOS</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta3->retraso_trabajado}}">
                    </div>
                </div>
                @endforeach
                
                
            </li>

          </ul>
        </div>
      </div>


@endsection

