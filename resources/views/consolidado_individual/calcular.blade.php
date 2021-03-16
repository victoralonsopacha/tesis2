@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">TIMBRADAS BIOMETRICO DIARIAS</div>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('consolidado_individual.index') }}">Regresar</a>
        </div>
        <br><br><br>
    @include('partials.validationError')
        <div class="text-center">
            <h3><b>USUARIO</b></h3>
            <h4>
                <p>Nombres y Apellidos:{{ ' '.$user->name.' '.$user->last_name }}</p>
                <p>Cedula:{{ ' '.$user->cedula }}</p>
            </h4>
        </div>
        <br>
        <form method="POST" id="formulariofecha" action="{{ route('consolidado_individual.total2', $user) }}" class="form-inline text-center">
            @csrf
            <div class="form-group">
                <label>FECHA INICIO:</label>
                <input type="date" class="form-control" id='fecha_inicio' name="fecha_inicio" value="'fecha_inicio'">
            </div>
            <div class="form-group">
                <label>FECHA FIN:</label>
                <input type="date" class="form-control" id='fecha_fin' name="fecha_fin" value="'fecha_fin'">
            </div>
            <br><br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button id="pdf" type="submit" class="btn btn-danger"><a class="nav-link"  onclick="pfd()"></a>
                    Descargar <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                </button>
                <button id="excel" type="submit" class="btn btn-success"><a class="nav-link"  onclick="excel()"></a>
                    Descargar <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                </button>
            </div>

        </form>


    </div><!--/.container-fluid-->

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

