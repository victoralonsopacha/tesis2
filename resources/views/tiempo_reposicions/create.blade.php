@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>Escoger Reposicion</h1>

    @include('partials.validation-errors')
    <form method="POST" action="{{ route('tiempo_reposicions.store') }}">
        @csrf
        

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Cedula del usuario</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="cedula" value="{{$cedula=auth()->user()->cedula}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad de Tiempo</label>
            <div class="col-sm-2">
                <input type="time" class="form-control" name="horas" value="{{old('horas', $tiempo_reposicions->horas)}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Dia que desea reponer</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="fecha" value="{{old('fecha', $tiempo_reposicions->fecha)}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
        
  
        


        
    </form>

@endsection
