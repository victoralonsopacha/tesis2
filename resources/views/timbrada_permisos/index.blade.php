@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
<h4>Por favor seleccione su usuario para proceder a timbrar</h4>
<br>
@include('partials.validationMessage')
@include('partials.validationError')

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
    @if($usersl->isempty())
        @include('partials.validationAlertempty')
    @else
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
    @endif
    </div><!--/.container-fluid-->
@endsection
