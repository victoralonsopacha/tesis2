@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Gestión de Usuarios Inactivos</div>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('users.activos') }}">Regresar</a>
        </div>
    <br><br>
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

    @if(Session::has('message'))
        @include('partials.validationMessage')
    @endif
    @if($usersl->isempty())
        @include('partials.validationAlertempty')
    @else
        <div class="row">
            <div class="panel panel-default">
                <table class="table table-responsive-md">
                    <thead class="thead-tomate">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Cédula</th>
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
            </div><!--panel-default-->
        </div><!--/.row-->
    @endif
    </div><!--/.container-fluid-->
@endsection
