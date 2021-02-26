@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h1>PERMISOS REGISTRADOS</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('consolidado_individual.index') }}">Regresar</a>
        </div>
        <div class="pull-right">
        <form class="form-inline my-2 my-lg-0 float-right">
            <label for="">Buscar por cedula:</label>
        <input name="buscador" class="form-control me-2" type="search" placeholder="Ingrese una cedula" aria-label="Search">
        <button class="btn btn-success" type="submit">Buscar</button>
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
