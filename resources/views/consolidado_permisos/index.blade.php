@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <b>TIMBRADAS DE PERMISOS</b>
            </div>
        </div>
    <p class="text-left">Aqui puede ver las timbradas de los usuarios que registraron sus salidas y entradas</p>
        <div class="pull-right">
            <form class="form-inline">
                <div class="form-group">
                    <label for="exampleInputName2">Buscar Por:</label>
                </div>
                <div class="form-group">
                    <input name="buscador" class="form-control me-2" type="search" placeholder="Ingrese una cedula" aria-label="Search">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
        </div>
    <br><br>
    @if($usersl->isEmpty())
        @include('partials.validationAlertempty')
    @else
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <!-- Table -->
            <div class="panel-heading text-center"><b>USUARIOS</b></div>
                <table class="table table-responsive-md text-center">
                    <thead class="thead-tomate">
                    <tr>
                        <th>Nr.</th>
                        <th>Nombres y Apellidos</th>
                        <th>Cedula</th>
                        <th>Cargo</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($usersl as $userItem)
                        @foreach($roles as $rol)
                            @foreach($rolesl as $role)
                                @if($rol->model_id == $userItem->id)
                                    @if($rol->role_id == $role->id)
                                    <tr>
                                        <td>{!! $i++ !!}</td>
                                        <td>{!! $userItem->name.' '.$userItem->last_name !!}</td>
                                        <td>{!! $userItem->cedula !!}</td>
                                        <td>{!! $role->name!!}</td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{ route('consolidado_permisos.calcular', $userItem) }}">Seleccionar</a>
                                        </td>
                                        <td>
                                    </tr>
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div><!--/.panel-default-->
    </div><!--/.container-fluid-->

@endsection
