@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <h1>TIMBRADAS REGISTRADAS</h1>
        
    @if(empty($consulta))
        @include('partials.validationAlertempty')
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
