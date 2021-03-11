@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    
    <h4>Este modulo permite calcular la cantidad de horas, dias, y atrasos en el periodo de tiempo que usted necesite</h4>
    <br>
    <div class="pull-right">
        <form class="form-inline my-2 my-lg-0 float-right">
            <label>Buscar Por:</label>
            <input name="buscador" class="form-control me-2" type="search" placeholder="Nombre" aria-label="Search">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
    </div>
    <br><br>
    <div class="panel panel-default">
        <div class="panel-heading">Profesores</div>
        <!-- Table -->
        @if($usersl->isEmpty())
            <p>No existen profesores</p>
        @else
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Nr.</th>
                    <th>Nombres y Apellidos</th>
                    <th>Cedula</th>
                    <th>Correo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php
                $i=1;
                @endphp
                @foreach($usersl as $userItem)
                    <tr>
                        <td>{!! $i++ !!}</td>
                        <td>{!! $userItem->name.' '.$userItem->last_name !!}</td>
                        <td>{!! $userItem->cedula !!}</td>
                        <td>{!! $userItem->email!!}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('calculo_tiempos.calcular', $userItem) }}">CALCULAR</a>
                        </td>
                        <td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
