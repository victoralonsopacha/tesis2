@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <h1>GESTION USUARIOS</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('users.inactivos') }}">Ver usuarios inactivos</a>
        </div>
        <div class="pull-right">
            <a href="{{route('users.create')}}" class="btn btn-warning">Agregar nuevo usuario</a>
        </div>
        <br><br>
        <br>
        <div class="pull-right">
            <form method="POST" action="{{route('users.find')}}" class="form-inline my-2 my-lg-0">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName2">Buscar Por:</label>
                    <input name="nombre" class="form-control me-2" type="text" placeholder="Nombre" aria-label="Search">
                </div>
                <div class="form-group">
                    <input name="cedula" class="form-control me-2" type="number" placeholder="Cédula" aria-label="Search">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
        </div>
        <br><br>

    @include('partials.validationMessage')


    @if($usersl->isempty())
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="alert alert-warning" role="alert">
                                No existen registros !!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
                <div class="panel panel-default">
                    <table class="table table-responsive-md">
                        <thead class="thead-tomate">
                        <tr>
                            <th>Nr.</th>
                            <th>Nombres y Apellidos</th>
                            <th>Email</th>
                            <th>Cedula</th>
                            <th>Rol</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($usersl as $users)
                                @foreach($roles as $rol)
                                    @foreach($rolesl as $role)
                                        @if($rol->model_id == $users->id)
                                            @if($rol->role_id == $role->id)
                                                <tr>
                                                    <td>{!! $i++ !!}</td>
                                                    <td>{!! $users->name." ".$users->last_name !!}</td>
                                                    <td>{!! $users->email !!}
                                                    <td>{!! $users->cedula !!}
                                                    <td>{!! $role->name !!}</td>
                                                    <td><span class="label label-primary">Activo</span></td>
                                                    <td>
                                                        <a class="btn btn-success btn-xs" href="{{ route('users.edit', $users->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    </td>
                                                    <td>
                                                        <form action="{{route('users.deactive', $users->id)}}" method="POST">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-danger btn-xs" onclick="return confirm('¿Seguro que deseas desactivar este usuario?')">
                                                                <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                                                </span></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    @endif
    </div>
@endsection
