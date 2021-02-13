@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>Usuarios</h1>
    <a href="{{route('users.create')}}" class="btn btn-primary">Agregar nuevo usuario</a>
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
        <div class="panel panel-default">
            <table class="table table-responsive-md">
                <thead class="thead-tomate">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usersl as $users)
                    <tr>
                        <td>{!! $users->name!!}</td>
                        <td>{!! $users->last_name!!}</td>
                        <td>{!! $users->cedula!!}</td>
                        <td>{!! $users->email!!}</td>
                        <td>{!! $users->password!!}</td>
                        <td>
                            <a href="{{ route('users.edit', $users)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                @csrf @method('DELETE')
                                <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
