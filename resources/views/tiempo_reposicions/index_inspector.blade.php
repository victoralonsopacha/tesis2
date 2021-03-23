@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h4>En este módulo puede observar los días que el profesor a escogido para reponer sus atrasos</h4>
    <br>
        <div class="pull-right">
            <form class="form-inline my-2 my-lg-0 float-right">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName2">Buscar Por:</label>
                    <input name="nombre" class="form-control me-2" type="text" placeholder="Nombre" aria-label="Search">
                </div>
                <div class="form-group">
                    <input name="cedula" class="form-control me-2" type="number" placeholder="Cédula" aria-label="Search">
                </div>
                <button type="submit" class="btn btn-success">Buscar</button>
            </form>
        </div>
        <br><br>
        @if($usersl->isEmpty())
            @include('partials.validationAlertempty')
        @else
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Profesores</div>
            <!-- Table -->
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
        </div><!--/.panel-default-->
        @endif
    </div><!--/.container-fluid-->
@endsection
