@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>Timbrar Permiso</h1>

    @include('partials.validation-errors')
    <form method="POST" action="{{ route('timbrada_permisos.store') }}">
        @csrf
        
        
            
        @foreach ($consulta as $consultaItem)
            
        
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Cedula del usuario</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="cedula" value="{{$consultaItem->cedula}}" readonly>
            </div>
        </div> 

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre del usuario</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="name" value="{{$consultaItem->name}}" readonly>
            </div>
        </div> 

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Apellido del usuario</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="last_name" value="{{$consultaItem->last_name}}" readonly>
            </div>
        </div> 

        @endforeach


        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">hora</label>
            <div class="col-sm-2">
                <input type="time" class="form-control" name="hora" value="{{ $fecha_hora->format('h:i:s') }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="fecha" value="{{ $fecha_hora->format('Y-m-d') }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="observacion">
            </div>
        </div>



        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tipo Permiso</label>
            <div class="col-sm-6">
                <select name="tipo_permiso">
                    <option {{old('tipo_permiso')=="salida"? 'selected':''}}  value="salida">salida</option>
                    <option {{old('tipo_permiso')=="entrada"? 'selected':''}} value="entrada">entrada</option>
                 </select>
            </div>
        </div>
  
        <div class="form-group row">
            
            <div class="col-sm-6">
                <input style="visibility:hidden" type="text" class="form-control" name="estado" value="0">
            </div>
        </div>


        <button type="submit" class="btn btn-info">Timbrar</button>
    </form>

@endsection
