@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
    <h1>Horas Totales</h1>
@endsection


@section('main-content')
<div class="container-fluid">
    <div class="pull-left">
        <a class="btn btn-primary" href="javascript:history.back()">Regresar</a>
    </div>
    <br><br>
    @if(empty($consulta2))
        <div class="alert alert-warning alert-dismissible text-center" role="alert">
            <p>No existe información para timbradas diarias, verificar la carga del archivo desde el biométrico</p>
        </div>
    @endif

    <div class="row">
    <div class="col-sm-6">
        <h1>Horas Totales</h1>
        @foreach ($consulta2 as $itemconsulta2)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">Cédula</label>
                <div class="col-sm-6">
                    <input id="cedula" type="hidden" class="form-control" name="date" value="{{$itemconsulta2->cedula }}">
                    <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta2->cedula }}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input id="nombre" type="hidden" class="form-control" name="date" value="{{$itemconsulta2->nombre }}">
                    <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta2->nombre }}</label>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">Apellido</label>
                <div class="col-sm-6">
                    <input id="apellido" type="hidden" class="form-control" name="date" value="{{$itemconsulta2->apellido }}">
                    <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta2->apellido }}</label>
                </div>
            </div>
        @endforeach


        @foreach ($consulta as $itemconsulta2)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">Horas Totales Trabajadas</label>
                <div class="col-sm-6">
                    <input id="horas_total_trabajados" type="input" class="form-control" name="date" value="{{$itemconsulta2->tiempo_trabajado}}" readonly>
                </div>
            </div>
        @endforeach


        @foreach ($consulta4 as $itemconsulta4)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">Días Totales Trabajados</label>
                <div class="col-sm-6">
                    <input id="dias_total_trabajados" type="input" class="form-control" name="date" value="{{$itemconsulta4->num_dias}} DIAS" readonly>
                </div>
            </div>
        @endforeach


        @foreach ($consulta3 as $itemconsulta3)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">Atrasos</label>
                <div class="col-sm-6">
                    <input id="atrasos" type="input" class="form-control" name="date" value="{{$itemconsulta3->retraso_trabajado}}" readonly>
                </div>
            </div>
        @endforeach

    </div><!--col-sm-6-->

    <div class="col-sm-6">
          <h1>Permisos Totales</h1>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">Horas Totales de Permisos</label>
            <div class="col-sm-6">
                @foreach ($consulta7 as $itemconsulta7)
                    <input id="total_permisos" type="input" class="form-control" name="date" value="{{$itemconsulta7->tiempo_permiso}}" readonly>
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">Cantidad de Permisos Solicitados</label>
            <div class="col-sm-6">
                @foreach ($consulta8 as $itemconsulta8)
                    <input id="permisos_solicitados" type="input" class="form-control" name="date" value="{{$itemconsulta8->cantidad_permisos}}" readonly>
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">Permisos Aprobados</label>
            <div class="col-sm-6">
                @if($consulta5)
                    @foreach ($consulta5 as $itemconsulta5)
                        <input id="permisos_aprobados" type="input" class="form-control" name="date" value="{{$itemconsulta5->permisos1}}" readonly>
                    @endforeach
                @else
                    <input id="permisos_aprobados" type="input" class="form-control" name="date" value="0" readonly>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">Permisos Rechazados</label>
            <div class="col-sm-6">
                @if($consulta6)
                    @foreach ($consulta6 as $itemconsulta6)
                        <input id="permisos_desaprobados" type="input" class="form-control" name="date" value="{{$itemconsulta6->permisos2}}" readonly>
                    @endforeach
                @else
                    <input id="permisos_desaprobados" type="input" class="form-control" name="date" value="0" readonly>
                @endif

            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">Permisos Pendientes</label>
            <div class="col-sm-6">
                @if($consulta9)
                    @foreach ($consulta9 as $itemconsulta9)
                        <input id="permisos_pendientes" type="input"  class="form-control" name="date" value="{{$itemconsulta9->permisos3}}" readonly>
                    @endforeach
                @else
                    <input id="permisos_pendientes" type="input" class="form-control" name="date" value="0" readonly>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-5 col-form-label">Tiempo de Reposición</label>
            <div class="col-sm-6">
                @if($reposicion)
                    @foreach ($reposicion as $itemreposicion)
                    <input id="reposicion" type="input"  class="form-control" name="date" value="{{$itemreposicion->tiempo_reposicions}}" readonly>
                    @endforeach
                @else
                    <input id="reposicion" type="input" class="form-control" name="date" value="0" readonly>
                @endif
            </div>
        </div>
        <form id="datosformulario" action="{{route('calculo_tiempos.exportPdf')}}" method="POST">
            @csrf
            <input id="pdfcedula" type="hidden" class="form-control" name="pdfcedula" value="" >
            <input id="pdfnombre" type="hidden" class="form-control" name="pdfnombre" value="" >
            <input id="pdfapellido" type="hidden" class="form-control" name="pdfapellido" value="" >

            <input id="pdftotaltrabajado" type="hidden" class="form-control" name="pdftotaltrabajado" value="" >
            <input id="pdfdias" type="hidden" class="form-control" name="pdfdias" value="" >
            <input id="pdfhoras" type="hidden" class="form-control" name="pdfhoras" value="" >
            <input id="pdfatrasos" type="hidden" class="form-control" name="pdfatrasos" value="" >

            <input id="pdftotal" type="hidden" class="form-control" name="pdftotal" value="" >
            <input id="pdfpermisos" type="hidden" class="form-control" name="pdfpermisos" value="" >
            <input id="pdfaprobados" type="hidden" class="form-control" name="pdfaprobados" value="" >
            <input id="pdfdesaprobados" type="hidden" class="form-control" name="pdfdesaprobados" value="" >
            <input id="pdfpendientes" type="hidden" class="form-control" name="pdfpendientes" value="" >
            <input id="pdfreposicion" type="hidden" class="form-control" name="pdfreposicion" value="" >

            <button class="btn btn-danger" type="submit">Descargar
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
            </button>
        </form>

    </div><!--col-sm-6-->
    </div><!--row-->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("datosformulario").addEventListener('submit', obtenerDatos);
        });

        function obtenerDatos(evento) {
            evento.preventDefault();
            var cedula = document.getElementById('cedula').value;
            var nombre = document.getElementById('nombre').value;
            var apellido = document.getElementById('apellido').value;

            var horas_total_trabajados = document.getElementById('horas_total_trabajados').value;
            var dias_total_trabajados = document.getElementById('dias_total_trabajados').value;
            var horas_total_trabajados = document.getElementById('horas_total_trabajados').value;
            var atrasos = document.getElementById('atrasos').value;

            var total_permisos = document.getElementById('total_permisos').value;
            var permisos_solicitados = document.getElementById('permisos_solicitados').value;
            var permisos_aprobados = document.getElementById('permisos_aprobados').value;
            var permisos_desaprobados = document.getElementById('permisos_desaprobados').value;
            var permisos_pendientes = document.getElementById('permisos_pendientes').value;
            var reposicion = document.getElementById('reposicion').value;

            document.getElementById('pdfcedula').value=cedula;
            document.getElementById('pdfnombre').value=nombre;
            document.getElementById('pdfapellido').value=apellido;

            document.getElementById('pdftotaltrabajado').value=horas_total_trabajados;
            document.getElementById('pdfdias').value=dias_total_trabajados;
            document.getElementById('pdfhoras').value=horas_total_trabajados;
            document.getElementById('pdfatrasos').value=atrasos;

            document.getElementById('pdftotal').value=total_permisos;
            document.getElementById('pdfpermisos').value=permisos_solicitados;
            document.getElementById('pdfaprobados').value=permisos_aprobados;
            document.getElementById('pdfdesaprobados').value=permisos_desaprobados;
            document.getElementById('pdfpendientes').value=permisos_pendientes;
            document.getElementById('pdfreposicion').value=reposicion;

            /*console.log(cedula);
            console.log(dias_total_trabajados);
            console.log(horas_total_trabajados);
            console.log(atrasos);

            console.log(total_permisos);
            console.log(permisos_solicitados);
            console.log(permisos_aprobados);
            console.log(permisos_desaprobados);
            console.log(permisos_pendientes);
            console.log(reposicion);
            console.log(permisos_aprobados);*/

        this.submit();
    }
</script>


@endsection

