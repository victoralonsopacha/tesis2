@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
    <h1>HORAS TOTALES</h1>
@endsection


@section('main-content')
<div class="container-fluid">
    <div class="pull-left">
        <a class="btn btn-primary" href="javascript:history.back()"> Volver Atrás</a>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{route('calculo_tiempos.index')}}"> Volver a Calcular</a>
    </div>
    <br><br>
    @if(empty($consulta2))
        <div class="alert alert-success alert-dismissible text-center" role="alert">
            <p>No existe informacion para este lapso de tiempo</p>
        </div>
    @endif
    <div class="row">
    <div class="col-sm-6">
        <h1>HORAS TOTALES</h1>
        @foreach ($consulta2 as $itemconsulta2)
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
        @endforeach


        @foreach ($consulta as $itemconsulta2)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">HORAS TOTALES TRABAJADAS</label>
                <div class="col-sm-6">
                    <input id="horas_total_trabajados" type="input" class="form-control" name="date" value="{{$itemconsulta2->tiempo_trabajado}}" readonly>
                </div>
            </div>
        @endforeach


        @foreach ($consulta4 as $itemconsulta4)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">DIAS TOTALES TRABAJADOS</label>
                <div class="col-sm-6">
                    <input id="dias_total_trabajados" type="input" class="form-control" name="date" value="{{$itemconsulta4->num_dias}} DIAS" readonly>
                </div>
            </div>
        @endforeach


        @foreach ($consulta3 as $itemconsulta3)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">ATRASOS</label>
                <div class="col-sm-6">
                    <input id="atrasos" type="input" class="form-control" name="date" value="{{$itemconsulta3->retraso_trabajado}}" readonly>
                </div>
            </div>
        @endforeach

    </div><!--col-sm-6-->

    <div class="col-sm-6">
          <h1>PERMISOS TOTALES</h1>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">HORAS TOTALES DE PERMISOS</label>
            <div class="col-sm-6">
                @foreach ($consulta7 as $itemconsulta7)
                    <input id="total_permisos" type="input" class="form-control" name="date" value="{{$itemconsulta7->tiempo_permiso}}" readonly>
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">CANTIDAD DE PERMISOS SOLICITADOS</label>
            <div class="col-sm-6">
                @foreach ($consulta8 as $itemconsulta8)
                    <input id="permisos_solicitados" type="input" class="form-control" name="date" value="{{$itemconsulta8->cantidad_permisos}}" readonly>
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">PERMISOS APROBADOS</label>
            <div class="col-sm-6">
                @if($consulta5)
                    @foreach ($consulta5 as $itemconsulta5)
                        <input id="permisos_aprobados" type="input" class="form-control" name="date" value="{{$itemconsulta5->permisos1}}" readonly>
                    @endforeach
                @else
                    <input type="input" class="form-control" name="date" value="0" readonly>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">PERMISOS DESAPROBADOS</label>
            <div class="col-sm-6">
                @if($consulta6)
                    @foreach ($consulta6 as $itemconsulta6)
                        <input id="permisos_desaprobados" type="input" class="form-control" name="date" value="{{$itemconsulta6->permisos2}}" readonly>
                    @endforeach
                @else
                    <input type="input" class="form-control" name="date" value="0" readonly>
                @endif

            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">PERMISOS PENDIENTES</label>
            <div class="col-sm-6">
                @if($consulta9)
                    @foreach ($consulta9 as $itemconsulta9)
                        <input id="permisos_pendientes" type="input"  class="form-control" name="date" value="{{$itemconsulta9->permisos3}}" readonly>
                    @endforeach
                @else
                    <input type="input" class="form-control" name="date" value="0" readonly>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">TIEMPO DE REPOSICION</label>
            <div class="col-sm-6">
                @if($reposicion)
                    @foreach ($reposicion as $itemreposicion)
                    <input type="input" id="reposicion" class="form-control" name="date" value="{{$itemreposicion->tiempo_reposicions}}" readonly>
                    @endforeach
                @else
                    <input type="input" class="form-control" name="date" value="0" readonly>
                @endif
            </div>
        </div>
        <form action="#" method="POST">
            @csrf
            <input id="" type="hidden" class="form-control" name="date" value="" >
            <input id="" type="input" class="form-control" name="date" value="" >
            <input id="" type="input" class="form-control" name="date" value="" >
            <input id="" type="input" class="form-control" name="date" value="" >
            <input id="" type="input" class="form-control" name="date" value="" >
            <input id="" type="input" class="form-control" name="date" value="" >
            <input id="" type="input" class="form-control" name="date" value="" >
            <input id="" type="input" class="form-control" name="date" value="" >
            <input id="" type="input" class="form-control" name="date" value="" >


            <button class="btn btn-danger btn-xs">DESCARGAR PDF</button>
        </form>

    </div><!--col-sm-6-->
    </div><!--row-->


@endsection

