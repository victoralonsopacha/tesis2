@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Timbrar Permiso</div>
        </div>

    <div class="pull-left">
        <a class="btn btn-primary" href="{{ route('timbrada_permisos.index') }}">Regresar</a>
    </div><br><br>

    @include('partials.validationMessage')
    @include('partials.validationError')

    @include('partials.validation-errors')
        <br>
        <form method="POST" action="{{ route('timbrada_permisos.store') }}">
            @csrf
            @foreach ($consulta as $consultaItem)
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Nombre del Usuario:</strong>
                        <input type="text" class="form-control" name="name" value="{{$consultaItem->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <strong>Apellido del Usuario:</strong>
                        <input type="text" class="form-control" name="last_name" value="{{$consultaItem->last_name}}" readonly>
                    </div>
                    <div class="form-group">
                        <strong>Cédula:</strong>
                        <input type="text" class="form-control" name="cedula" value="{{$consultaItem->cedula}}" readonly>
                    </div>

                </div><!--/.col-md-6-->
            @endforeach
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        <input type="date" class="form-control" name="fecha" value="{{ $fecha_hora->format('Y-m-d') }}" readonly>
                    </div>
                    <div class="form-group">
                        <strong>Hora:</strong>
                        <input type="time" class="form-control" name="hora" value="{{ $fecha_hora->format('H:i:s') }}" readonly>
                    </div>
                    <div class="form-group">
                        <strong>Tipo Permiso:</strong>
                        {!! Form::select('tipo_permiso[]', $tipo_permiso,$tipo_permiso,['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                        <strong>Observación:</strong>
                        <input type="text" class="form-control" name="observacion">
                    </div>
                </div><!--/.col-md-6-->
            </div><!--/.row-->
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Timbrar</button>
                </div>
        </form><!--/.form-->
    </div><!--/.container-fluid-->
@endsection
