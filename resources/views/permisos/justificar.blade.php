@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading text-center"><b>Justificar Permisos</b></div>
    </div><!--/.panel-primary-->

        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('permisos.index') }}">Regresar</a>
        </div>
        <br><br>
        <form method="POST" action="{{ route('permisos.update', $permiso) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6">
                    @foreach($usuario as $user)
                    <div class="form-group">
                        <strong>Usuario:</strong>
                        <input type="text" class="form-control" value="{{$user['name'].' '.$user['last_name']}}" readonly>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <strong>Fecha Inicio:</strong>
                        <input type="date" class="form-control" name="fecha_inicio" value="{{old('fecha_inicio', $permiso->fecha_inicio)}}" readonly>
                    </div>
                    <div class="form-group">
                        <strong>Hora Inicio:</strong>
                        <input type="time" class="form-control" name="hora_inicio" value="{{old('hora_inicio', $permiso->hora_inicio)}}" readonly>
                    </div>
                    <div class="form-group">
                        <strong>Fecha Fin:</strong>
                        <input type="date" class="form-control" name="fecha_fin" value="{{old('fecha_fin', $permiso->fecha_fin)}}" readonly>
                    </div>
                    <div class="form-group">
                        <strong>Hora Fin:</strong>
                        <input type="time" class="form-control" name="hora_fin" value="{{old('hora_fin', $permiso->hora_fin)}}" readonly>
                    </div>
                    <div class="form-group">
                         <strong>Tipo Permiso:</strong>
                         <input type="text" class="form-control" name="tipo_permiso" value="{{$permiso->tipo_permiso}}" readonly>
                    </div>
                    <div class="form-group">
                        <strong>Justificación del Usuario:</strong>
                        <input type="text" class="form-control" name="descripcion" value="{{old('descripcion', $permiso->descripcion)}}" readonly>
                    </div>
                </div><!--/.col-xs-6-->
                <div class="col-md-6 col-sm-6 col-6">

                    <div class="form-group">
                        <strong>Seleccionar:</strong>
                        {!! Form::select('estado[]',$estado, null,['class' => 'form-control']); !!}
                    </div>
                    
                    <div class="form-group">
                        <strong>Observación:</strong>
                        <input type="text" class="form-control" name="desaprobacion" value="{{old('desaprobacion', $permiso->desaprobacion)}}" >
                    </div>
                    @if($permiso->file != '')
                        <div class="form-group">
                            <strong>Archivo Justificación:</strong><br>
                            <img src="{{asset("$permiso->file")}}" alt="" style="width:250px;height:250px;">
                        </div>
                    @endif
                </div><!--/.col-xs-6-->
            </div><!--/.row-->
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Justificar Permiso</button>
            </div><!--/.button-->
        </form>
    </div><!--/.container-fluid-->
@endsection
