@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

 
@section('main-content')
    <h1>DIAS DE REPOSICION</h1>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        
        <div class="panel-heading">Profesores</div>
        <!-- Table -->


       
        
            
        <table class="table table-responsive-md text-center">
            <thead class="thead-tomate">
            <tr>
                <th>Cedula</th>
                <th>Horas</th>
                <th>Fecha</th>
            </tr>
            </thead>

            @foreach ($consulta as $consultaitem)
            <tbody>
           
                <tr>
                    <td>{{$consultaitem->cedula }}</td>
                    <td>{{ $consultaitem->horas }}</td>
                    <td>{{ $consultaitem->fecha }}</td>
                    <td>
                </tr>
           
            </tbody>
        


        @endforeach
            
    </table>
    </div>
    <a class="btn btn-primary" href="{{ route('tiempo_reposicions.index_inspector') }}">Regresar</a>

@endsection
