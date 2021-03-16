@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
<h4>Por favor ingrese su numero de cedula para timbrar</h4>
<br>
@include('partials.validationMessage')
@include('partials.validationError')

<div class="pull-right">
    <form class="form-inline my-2 my-lg-0 float-right">
        <label for="">Buscar por cedula:</label>
        <input name="buscador" class="form-control me-2" type="search" placeholder="Ingrese una cedula" aria-label="Search">
        <button class="btn btn-success" type="submit">Buscar</button>
    </form>
</div>
<br><br>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Profesores</div>

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
                                    <td>{{$i++}}</td>
                                    <td>{!! $userItem->name.' '.$userItem->last_name !!}</td>
                                    <td>{!! $userItem->cedula !!}</td>
                                    <td>{!! $role->name!!}</td>
                                    <td>
                                        <form action="{{route('timbrada_permisos.create', $userItem->id)}}" method="POST">
                                            @csrf @method('PATCH')
                                            <button class="btn btn-primary btn-xs">Seleccionar</button>
                                        </form>
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
</div>
@endsection
