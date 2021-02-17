@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

 
@section('main-content')
    <h1>DIAS DE REPOSICION</h1>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <form class="form-inline my-2 my-lg-0 float-right">
            <input name="buscador" class="form-control me-2" type="search" placeholder="Ingrese una cedula" aria-label="Search">
            <button class="btn btn-success" type="submit">Buscar</button>
          </form>
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

@endsection
