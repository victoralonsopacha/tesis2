@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

<<<<<<< HEAD

@section('main-content')
    <h1>REPORTE CONSOLIDADO</h1>
=======
 
@section('main-content')
    <h1>CALCULAR HORAS</h1>
>>>>>>> 34ff6b54779d1b9cdbf2c1f5fba008e6abcaac34

    <div class="panel panel-default">
        <!-- Default panel contents -->
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
<<<<<<< HEAD
                    <th>Cargo</th>
=======
                    <th>Cargo</th> 
>>>>>>> 34ff6b54779d1b9cdbf2c1f5fba008e6abcaac34
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($usersl as $userItem)
                    <tr>
                        <td>{!! $userItem->cedula !!}</td>
                        <td>{!! $userItem->name !!}</td>
                        <td>{!! $userItem->last_name !!}</td>
                        <td>{!! $userItem->cargo!!}</td>
                        <td>
                            <a href="{{ route('consolidado_individual.calcular', $userItem) }}">CALCULAR</a>
                        </td>
                        <td>
                    </tr>
                @endforeach
                </tbody>
            </table>
<<<<<<< HEAD
        @endif
=======
        @endif 
>>>>>>> 34ff6b54779d1b9cdbf2c1f5fba008e6abcaac34

    </div>

@endsection
