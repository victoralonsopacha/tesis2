@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>Justificar Permisos</h1>
    <form method="POST" action="{{ route('permisos.update', $permiso) }}">
        @method('PATCH')
        @csrf
        <span>Permiso de: {{  $permiso->cedula }}</span><br>
        <span>Permiso N.: {{ $permiso->id }}</span><br>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-6">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Fecha de inicio</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fecha_inicio" value="{{old('fecha_inicio', $permiso->fecha_inicio)}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Hora Inicio</label>
                    <div class="col-sm-8">
                        <input type="time" class="form-control" name="hora_inicio" value="{{old('hora_inicio', $permiso->hora_inicio)}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Descripción</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="descripcion" value="{{old('descripcion', $permiso->descripcion)}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Estado</label>
                    <div class="col-sm-8">
                        <select name="estado">
                            <option {{old('estado',$permiso->estado)=="null"? 'selected':''}} value="null">Seleccionar</option>
                            <option {{old('estado',$permiso->estado)=="1"? 'selected':''}} value="1">Aprobado</option>
                            <option {{old('estado',$permiso->estado)=="0"? 'selected':''}} value="0">Desaprobado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-6">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Fecha Fin</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fecha_fin" value="{{old('fecha_fin', $permiso->fecha_fin)}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Hora Fin</label>
                    <div class="col-sm-8">
                        <input type="time" class="form-control" name="hora_fin" value="{{old('hora_fin', $permiso->hora_fin)}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Tipo Permiso</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="tipo_permiso" value="{{$permiso->tipo_permiso}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Archivo Adjunto</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="file" value="{{old('file', $permiso->file)}}">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
