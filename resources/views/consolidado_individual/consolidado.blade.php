@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <h1>PERMISOS REGISTRADOS</h1>

    @if(empty($consulta))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="alert alert-warning" role="alert">
                                No existen registros!!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <!-- Table -->
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Tiempo</th>
                    <th>Fecha</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                    @foreach($consulta as $consultaItem)
                        <tr>
                            <td>{{$consultaItem->cedula}} </td>
                            <td>{{$consultaItem->nombre}}</td>
                            <td>{{$consultaItem->tiempo}}</td>
                            <td>{{$consultaItem->fecha}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
    </div>
    @endif
    </div>

@endsection
