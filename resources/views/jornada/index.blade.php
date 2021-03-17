@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align: center">Jornada</div>
    </div>

    <!--Seccion Validacion Fechas-->
        @include('partials.validation-errors')
        <div class="row">
            <form method="POST" id="formulariofecha" action="{{ route('jornada.buscar') }}">
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
        </div>
        <br>
        @if($jornadas->isempty())
            @include('partials.validationAlertempty')
        @else
            <div class="panel">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead class="thead-tomate">
                        <tr>
                            <th>Nr.</th>
                            <th>Fecha</th>
                            <th>Hora Entrada</th>
                            <th>Hora Salida</th>
                            <th>Total Horas Trabajadas</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach($jornadas as $jornada)
                            <tr>
                                <td>{!! $i++ !!}</td>
                                <td>{!! $jornada->fecha!!}</td>
                                <td>{!! $jornada->hora_entrada!!}</td>
                                <td>{!! $jornada->hora_salida!!}</td>
                                <td>{!! $jornada->tiempo_total!!}</td>
                            </tr>
                        @endforeach
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                    <nav aria-label="..." class="text-center">
                        {{$jornadas->links()}}
                    </nav>
                </div><!--div table-->
            </div><!--div panel-->
        @endif
    </div><!--div container-fluid-->
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
    </script>

@endsection
