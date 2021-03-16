@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h4>Este modulo permite calcular la cantidad de horas, dias, y atrasos en el periodo de tiempo que usted necesite</h4>
    <br>
    <div class="pull-right">
        <form class="form-inline my-2 my-lg-0 float-right">
            <label>Buscar Por:</label>
            <div class="form-group">
                <input name="nombre" class="form-control me-2" type="text" placeholder="Nombre" aria-label="Search">
            </div>
            <div class="form-group">
                <input name="cedula" class="form-control me-2" type="search" placeholder="Cedula" aria-label="Search">
            </div>
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
    </div>
    <br><br>

    <div class="panel panel-default">
        <div class="panel-heading">Profesores</div>
        <!-- Table -->
        @if($usersl->isEmpty())
            @include('partials.validationAlertempty')
        @else
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Nr.</th>
                    <th>Nombres y Apellidos</th>
                    <th>Cedula</th>
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
                                    <td>{!! $role->name !!}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route('calculo_tiempos.calcular', $userItem) }}">Seleccionar</a>
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
    </div><!--/.panel-->
    </div><!--/.container-fluid-->
@endsection
