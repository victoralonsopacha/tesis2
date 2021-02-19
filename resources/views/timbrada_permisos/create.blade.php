@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>Timbrar Permiso</h1>

    @include('partials.validation-errors')
    <form method="POST" action="{{ route('timbrada_permisos.store') }}">
        @csrf
        
        @foreach ($timbrada_permiso as $item)
            
        
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Cedula del usuario</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="cedula" value="{{ $timbrada_permiso->cedula }}">
            </div>
        </div> 

        @endforeach


        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">hora</label>
            <div class="col-sm-2">
                <input type="time" class="form-control" name="hora">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="fecha" >
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
                    <option {{old('tipo_permiso',$timbrada_permiso->tipo_permiso)=="salida"? 'selected':''}}  value="salida">salida</option>
                    <option {{old('tipo_permiso',$timbrada_permiso->tipo_permiso)=="entrada"? 'selected':''}} value="entrada">entrada</option>
                 </select>
            </div>
        </div>
  
        <div class="form-group row">
            
            <div class="col-sm-6">
                <input style="visibility:hidden" type="text" class="form-control" name="estado" value="{{$timbrada_permiso->estado=0}}">
            </div>
        </div>


        <button type="submit" class="btn btn-info">Timbrar</button>
    </form>

@endsection
