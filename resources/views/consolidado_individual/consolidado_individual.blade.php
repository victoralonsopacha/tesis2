@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

 
@section('main-content')
    <h1>TIMBRADAS</h1>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Profesores</div>
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

@endsection
