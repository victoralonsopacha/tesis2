@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Permisos Aprobados</div>
        </div>
        <div class="pull-left">
            <a href="{{ route('permiso_profesors.shows') }}" class="btn btn-primary">Regresar</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('permiso_profesors.create')}}">Crear Nuevo Permiso</a>
        </div>
        <br><br><br>

        <div class="row">
            <form method="POST" id="formulariofecha" action="{{ route('permiso_profesors.buscarA') }}">
                @csrf
                <div class="col-sm-1 col-lg-1">
                    <strong>De:</strong>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <input type="date" class="form-control" id='fecha_inicio' name="fecha_inicio" value="'fecha_inicio'">
                </div>
                <div class="col-sm-1 col-lg-1">
                    <strong>Hasta:</strong>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <input type="date" class="form-control" id='fecha_fin' name="fecha_fin" value="'fecha_fin'">
                </div>
                <div class="col-sm-3 col-lg-3">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </form>
        </div><!-- /.row -->
        <br>

        @if($permisos->isEmpty())
            <div class="alert alert-danger" role="alert">No existen registros actualmente</div>
        @else<br>
            @include('permiso_profesors.form')
        @endif
    </div><!-- /.container-fluid-->

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
    </script>
@endsection
