@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <h1>USUARIOS INACTIVOS</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('users.activos') }}">Regresar</a>
        </div>
    <br><br>
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
    @endif
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
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usersl as $users)
                                @foreach($roles as $rol)
                                    @foreach($rolesl as $role)
                                        @if($rol->model_id == $users->id)
                                            @if($rol->role_id == $role->id)
                                                <tr>
                                                    <td>{!! $users->id !!}</td>
                                                    <td>{!! $users->name." ".$users->last_name !!}</td>
                                                    <td>{!! $users->email !!}
                                                    <td>{!! $role->name !!}</td>
                                                    <td><span class="label label-danger">Inactivo</span></td>
                                                    <td>
                                                        <form action="{{route('users.active', $users->id)}}" method="POST">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-success btn-xs">Activar</button>
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
