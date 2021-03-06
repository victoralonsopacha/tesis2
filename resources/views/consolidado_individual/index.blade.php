@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <b>Timbradas del Biométrico</b>
            </div>
        </div>
        <h4>Este módulo permite ver las timbradas registradas en el biométrico de los usuarios registrados</h4>
        <div class="pull-right">
            <form class="form-inline my-2 my-lg-0 float-right">
                <label>Buscar Por:</label>
                <div class="form-group">
                    <input name="nombre" class="form-control me-2" type="text" placeholder="Nombre" aria-label="Search">
                </div>
                <div class="form-group">
                    <input name="cedula" class="form-control me-2" type="search" placeholder="Cédula" aria-label="Search">
                </div>
                <button class="btn btn-success" type="submit">Buscar</button>
            </form>
        </div>
        <br><br>

    @if($usersl->isEmpty())
        @include('partials.validationAlertempty')
    @else
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <!-- Table -->
        <div class="panel-heading text-center"><b>Usuarios</b></div>
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Nr.</th>
                    <th>Nombres y Apellidos</th>
                    <th>Cédula</th>
                    <th>Cargo</th>
                    <th>Acción</th>
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
                                        <a class="btn btn-primary btn-xs" href="{{ route('consolidado_individual.calcular', $userItem) }}">Seleccionar</a>
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
    </div>
    </div>

@endsection
