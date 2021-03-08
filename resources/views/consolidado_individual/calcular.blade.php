@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>Timbradas diarias registradas</h1>
    <div class="pull-left">
        <a class="btn btn-primary" href="{{ route('consolidado_individual.index') }}">Regresar</a>
    </div>
    <br><br><br>
    <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <div class="form-group">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cedula</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">{{ $user->cedula }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">{{ $user->name }}</label>
                    </div>
                </div>
                <div class="form-group">
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


                <form  method="POST"  id="formulariofecha" action="{{ route('consolidado_individual.total2', $user) }}">
                        @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">INICIO</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id='fecha_inicio' name="fecha_inicio" value="'fecha_inicio'">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">FIN</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id='fecha_fin' name="fecha_fin" value="'fecha_fin'">
                            <input type="hidden" class="form-control" id='formato' name="formato" value=""  >
                        </div>
                    </div>
                    <button id="pdf" type="submit" class="btn btn-success"><a class="nav-link"  onclick="pfd()" >Ver Timbradas pdf</a></button>
                    <button id="excel" type="submit" class="btn btn-success"><a class="nav-link"  onclick="excel()">Ver Timbradas excel</a></button>
 

                </form>

            </li>

          </ul>
        </div>
      </div>



    <script>
          document.addEventListener("DOMContentLoaded", function() {
          document.getElementById("formulariofecha").addEventListener('submit', validarFechas);
           });

        function validarFechas(evento) {
            evento.preventDefault();
          var fecha_inicio = $("#fecha_inicio").val();
          var fecha_fin =  $("#fecha_fin").val();
          var inicio = new Date(fecha_inicio);
            var fin = new Date(fecha_fin);
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
           this.submit();
        }

        function pfd() {

            var inputFormato = document.getElementById("formato");
            inputFormato.value = "PDF";
        }
        function excel() {

            var inputFormato = document.getElementById("formato");
            inputFormato.value = "EXCEL";
        }

    </script>

@endsection

