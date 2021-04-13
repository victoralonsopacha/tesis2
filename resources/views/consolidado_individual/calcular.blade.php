@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Timbradas del Biométrico</div>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('consolidado_individual.index') }}">Regresar</a>
        </div>
        <br><br><br>
    @include('partials.validationError')
        <div class="text-center">
            <h3><b>Usuario</b></h3>
            <h4>
                <p>Nombre y Apellido:{{ ' '.$user->name.' '.$user->last_name }}</p>
                <p>Cédula:{{ ' '.$user->cedula }}</p>
            </h4>
        </div>
        <br>
        <form  method="POST"  id="formulariofecha" action="{{ route('consolidado_individual.total2', $user) }}" class="form-inline text-center">
            @csrf
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Inicio:</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id='fecha_inicio' name="fecha_inicio" value="'fecha_inicio'">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Fin:</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id='fecha_fin' name="fecha_fin" value="'fecha_fin'">
                    <input type="hidden" class="form-control" id='formato' name="formato" value=""  >
                </div>
            </div>
            <button id="pdf" type="submit" class="btn btn-danger"><a class="link-descargar"  onclick="pfd()">
                    Descargar <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
            </button>

        </form>



    </div><!--/.container-fluid-->

    <script>
          document.addEventListener("DOMContentLoaded", function() {
          document.getElementById("formulariofecha").addEventListener('submit', validarFechas);
           });
          function validarFechas(evento) {
              evento.preventDefault();
              var fecha_inicio = document.getElementById("fecha_inicio").value;
              var fecha_fin = document.getElementById("fecha_fin").value;
              var inicio = new Date(fecha_inicio);
              var fin = new Date(fecha_fin);
              var array_fechafin = fecha_fin.split("-");


              var objFecha = new Date();
              let DIA_EN_MILISEGUNDOS = 24 * 60 * 60 * 1000;
              let manana = new Date(objFecha.getTime() + DIA_EN_MILISEGUNDOS);
              var dia  = manana.getDate();
              var mes  = manana.getMonth()+1;
              var anio = manana.getFullYear();

              var transfor_fechafin =new Date(array_fechafin[0],array_fechafin[1],array_fechafin[2]);
              var transfor_fechamanana =new Date(anio,mes,dia);


              if(fecha_inicio.length == 0){
                  alert("Debe ingresar una fecha de inicio");
                  return;
              }
              if(fecha_fin.length == 0){
                  alert("Debe ingresar una fecha final");
                  return;
              }
              if(inicio > fin){
                  alert("La fecha fin no puede ser menor");
                  return;
              }
              if(transfor_fechamanana <= transfor_fechafin){
                  alert("La fecha fin no puede ser superior a la actual");
                  return;
              }

              this.submit();
          }

          function pfd() {
              var inputFormato = document.getElementById("formato");
              inputFormato.value = "PDF";
          }


    </script>

@endsection

