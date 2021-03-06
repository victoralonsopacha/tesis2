@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h1>TIMBRADAS DEL BIOMETRICO</h1>
    <h2>Aqui puede ver las timbradas de los usuarios registradas en el biometrico</h2>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="alert alert-warning" role="alert">
                                No existen registros!!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <!-- Table -->
        <div class="panel-heading text-center"><b>USUARIOS</b></div>
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
                    @foreach($roles as $rol)
                        @foreach($rolesl as $role)
                            @if($rol->model_id == $userItem->id)
                                @if($rol->role_id == $role->id)
                                <tr>
                                    <td>{!! $userItem->cedula !!}</td>
                                    <td>{!! $userItem->name !!}</td>
                                    <td>{!! $userItem->last_name !!}</td>
                                    <td>{!! $role->name!!}</td>

                                    <td>

                                        <a class="btn btn-primary" href="{{ route('consolidado_individual.calcular', $userItem) }}">VER</a>
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
