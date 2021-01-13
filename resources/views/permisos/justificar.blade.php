@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>Justificar Permisos</h1>
    <form method="POST" action="{{ route('permisos.update', $permiso) }}">
        @csrf @method('PATCH')
        <span>Permiso de: {{  $permiso->cedula }}</span><br>
        <span>Permiso N.: {{ $permiso->id }}</span><br>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-6">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Fecha de inicio</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fecha_inicio" value="{{old('fecha_inicio', $permiso->fecha_inicio)}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Hora Inicio</label>
                    <div class="col-sm-8">
                        <input type="time" class="form-control" name="hora_inicio" value="{{old('hora_inicio', $permiso->hora_inicio)}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Descripción</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="descripcion" value="{{old('descripcion', $permiso->descripcion)}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Aprobar/Desaprobar</label>
                    <div class="col-sm-8">
                        <select name="estado" id="estado" class="form-control input-sm">
                            <option value="0">Desaprobar</option>
                            <option value="1">Aprobar</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-6">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Fecha Fin</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fecha_fin" value="{{old('fecha_fin', $permiso->fecha_fin)}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Hora Fin</label>
                    <div class="col-sm-8">
                        <input type="time" class="form-control" name="hora_fin" value="{{old('hora_fin', $permiso->hora_fin)}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Tipo Permiso</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="tipo_permiso" value="{{$permiso->tipo_permiso}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Ver justificativo</label>
                    <div class="col-sm-8">
                        <img src="public/WhatsApp Image 2021-01-08 at 18.05.58 (2).jpeg">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
