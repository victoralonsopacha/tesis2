@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Solicitar Reposición de Atraso</div>
    </div>
    <h4>Este módulo te permite proponer un día y la cantidad de tiempo a reponer por tus atrasos</h4>
    <br>
        @include('partials.validationMessage')
        @include('partials.validation-errors')
        <form method="POST" id="reposicion_atraso" action="{{ route('tiempo_reposicions.store') }}">
            @csrf

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Cédula del usuario</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="cedula" value="{{$cedula=auth()->user()->cedula}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nombre del usuario</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nombre" value="{{$cedula=auth()->user()->name}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Apellido del usuario</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="apellido" value="{{$cedula=auth()->user()->last_name}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad de Tiempo</label>
                <div class="col-sm-2">
                    <input type="time" min="00:00" max="08:00" class="form-control" name="horas">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Día que desea reponer</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="fecha" name="fecha">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success">Solicitar</button>
                </div>
            </div>
        </form>
    </div><!--/.container-fluid-->

    <script>
          document.addEventListener("DOMContentLoaded", function() {
          document.getElementById("reposicion_atraso").addEventListener('submit', validarFechas);
           });
          function validarFechas(evento) {
            evento.preventDefault();
            var fecha_inicio = document.getElementById("fecha").value;
            var inicio = new Date(fecha_inicio);
            var array_fecha = fecha_inicio.split("-");

            var objFecha = new Date();
            let DIA_EN_MILISEGUNDOS = 24 * 60 * 60 * 1000;
            let hoy = new Date(objFecha.getTime() + DIA_EN_MILISEGUNDOS);
            var dia  = hoy.getDate()-1;
            var mes  = hoy.getMonth();
            var anio = hoy.getFullYear();

            var transfor_fechahoy =new Date(anio,mes,dia);
            var transfor_fechafin =new Date(array_fecha[0],array_fecha[1],array_fecha[2]);

            console.log(transfor_fechahoy);
            console.log(transfor_fechafin);

            if(inicio < transfor_fechahoy){
                alert("La fecha debe ser posterior al día de hoy");
                return;
            }
            
            //this.submit();
          }
    </script>



@endsection
