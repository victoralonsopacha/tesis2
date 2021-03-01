@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

 
@section('main-content')
    <h1>DIAS DE REPOSICION</h1>
    <h4>En este modulo puede observar los dias que el profesor a escogido para reponer sus sus atrasos</h4>
    <br>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <form class="form-inline my-2 my-lg-0 float-right">
            <input name="buscador" class="form-control me-2" type="search" placeholder="Ingrese una cedula" aria-label="Search">
            <button class="btn btn-success" type="submit">Buscar</button>
          </form>
        <div class="panel-heading">Profesores</div>
        <!-- Table -->


        @if($usersl->isEmpty())
            <p>No existen profesores</p>
        @else
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cargo</th> 
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($usersl as $userItem)
                    <tr>
                        <td>{!! $userItem->cedula !!}</td>
                        <td>{!! $userItem->name !!}</td>
                        <td>{!! $userItem->last_name !!}</td>
                        
                        <td>
                            <a class="btn btn-primary" href="{{ route('tiempo_reposicions.ver_dias', $userItem) }}">VER</a>
                        </td>
                        <td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif 

    </div>

@endsection
