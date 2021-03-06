@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <h4>Este módulo permite observar las propuestas de los profesores para reponer sus atrasos</h4>
    <br>
        <div class="pull-right">
        <form class="form-inline my-2 my-lg-0 ">
            <strong>Buscar por:</strong>
            <input name="cedula" class="form-control me-2" type="search" placeholder="Cédula" aria-label="Search">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
        </div>
        <br><br>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <table class="table table-responsive-md text-center">
            <thead class="thead-tomate">
            <tr>
                <th>Nr.</th>
                <th>Nombres y Apellidos</th>
                <th>Cédula</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
            </thead>
            @php
                $i=1;
            @endphp
            @foreach ($tiempos as $tiempos)
                <tbody>
                <tr>
                    <td>{{$i++ }}</td>
                    <td>{{ $tiempos->nombre.' '.$tiempos->apellido }}</td>
                    <td>{{ $tiempos->cedula }}</td>
                    <td>{{ $tiempos->fecha }}</td>
                    <td>{{ $tiempos->horas }}</td>
                <td>{!! $tiempos->estado  !!}</td>
                </tbody>
            @endforeach
        </table>

    </div>
    </div>
@endsection
