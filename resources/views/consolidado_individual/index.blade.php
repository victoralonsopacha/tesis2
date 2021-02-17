@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

  
@section('main-content')
    <h1>VER TIMBRADAS</h1>
    <form class="form-inline my-2 my-lg-0 float-right">
        <input name="buscador" class="form-control me-2" type="search" placeholder="Ingrese una cedula" aria-label="Search">
        <button class="btn btn-success" type="submit">Buscar</button>
      </form>
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
                        <td>{!! $userItem->cargo!!}</td>
                        <td>
                            <a href="{{ route('consolidado_individual.calcular', $userItem) }}">VER</a>
                        </td>
                        <td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif 

    </div>

@endsection
