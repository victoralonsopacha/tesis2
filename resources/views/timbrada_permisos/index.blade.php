@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
<h1>TIMBRAR PERMISO</h1>
<h4>Por favor ingrese su numero de cedula para timbrar</h4>
<br>
@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('message')}}
    </div>
@endif
<div class="pull-left">
    <a class="btn btn-primary" href="{{ route('timbrada_permisos.index') }}">Regresar</a>
</div>
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
                                    <td>{!! $userItem->id !!}</td>
                                    <td>{!! $userItem->cedula !!}</td>
                                    <td>{!! $userItem->name !!}</td>
                                    <td>{!! $userItem->last_name !!}</td>
                                    <td>{!! $role->name!!}</td>
                                    <td>
                                        <form action="{{route('timbrada_permisos.create', $userItem->id)}}" method="POST">
                                            @csrf @method('PATCH')
                                            <button class="btn btn-warning btn-xs">Timbrar</button>
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
