@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>PERMISOS REGISTRADOS</h1>

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


                <form  method="POST"  id="formulariofecha" action="{{ route('consolidado_permisos.total2', $user) }}">
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
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><a class="nav-link" >Ver Timbradas</a></button>

                </form>

            </li>

          </ul>
        </div>
      </div>

      <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('consolidado_permisos.index') }}">Regresar</a>
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

            if(inicio > fin){
              
                alert("La fecha fin no puede ser menor");
                return;
            }
            this.submit();
        }
       
        </script>

@endsection
