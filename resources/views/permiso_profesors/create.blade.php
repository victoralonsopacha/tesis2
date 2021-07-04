@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Crear Permisos</div>
        </div>
        <h4>Este módulo te permite crear un permiso</h4>
        <br>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('permiso_profesors.shows') }}">Regresar</a>
        </div>
        <br><br><br>
        
        @include('partials.validation-errors')
        <div class="row">
            <form id="formulariofecha" action="{{route('permiso_profesors.store')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Fecha de Inicio:</strong>
                        
                        {!! Form::date('fecha_inicio', null, array('class' => 'form-control','id'=>'fecha_inicio')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Hora Inicio:</strong>
                        {!! Form::time('hora_inicio', null, array('class' => 'form-control','required','min'=>'07:00','max'=>'18:30')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Fecha Fin:</strong>
                        {!! Form::date('fecha_fin', null, array('class' => 'form-control','id'=>'fecha_fin')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Hora Fin:</strong>
                        {!! Form::time('hora_fin', null, array('class' => 'form-control','required','min'=>'07:00','max'=>'18:30')) !!}
                    </div>
                </div>
                    
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Tipo Permiso:</strong>
                        {!! Form::select('tipo_permiso[]',$tipo_permiso, null,['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        {!! Form::text('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        <strong>Adjuntar Justificacion:</strong>
                        <div class="help-block" style="color:red;">!No olvide seleccionar un archivo adjunto si es necesario!</div>                    
                        <input type="file" class="form-control" name="file" id="file" accept="image/*" enctype="multipart/form-data">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Crear Permiso</button>
                </div>
            </form>
        </div><!--/.row-->
    </div><!--/.container fluid-->

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
                  alert("La fecha fin no puede ser menor a la inicial");
                  return;
              }
              this.submit();
          }

    </script>
@endsection

