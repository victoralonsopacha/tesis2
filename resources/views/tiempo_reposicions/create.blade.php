@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Solicitar Reposición de Atraso</div>
    </div>
        @include('partials.validationMessage')
        @include('partials.validation-errors')
        <form method="POST" action="{{ route('tiempo_reposicions.store') }}">
            @csrf

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Cédula del usuario</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="cedula" value="{{$cedula=auth()->user()->cedula}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nombre del usuario</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nombre" value="{{$cedula=auth()->user()->name}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Apellido del usuario</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="apellido" value="{{$cedula=auth()->user()->last_name}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad de Tiempo</label>
                <div class="col-sm-2">
                    <input type="time" min="00:00" max="08:00" class="form-control" name="horas" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Día que desea reponer</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success">Solicitar</button>
                </div>
            </div>
        </form>
    </div><!--/.container-fluid-->



@endsection
