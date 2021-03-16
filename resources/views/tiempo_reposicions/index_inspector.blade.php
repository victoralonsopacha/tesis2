@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h4>En este módulo puede observar los dias que el profesor a escogido para reponer sus atrasos</h4>
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
                                        <td>{!!$i++ !!}</td>
                                        <td>{!!$userItem->name.' '.$userItem->last_name !!}</td>
                                        <td>{!! $userItem->cedula !!}</td>
                                        <td>{!! $role->name!!}</td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{ route('tiempo_reposicions.ver_dias', $userItem) }}">Seleccionar</a>
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
