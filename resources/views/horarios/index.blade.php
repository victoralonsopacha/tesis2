@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>GESTIONAR HORARIOS</h1>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Usuarios</div>
        <!-- Table -->
        @if($usersl->isEmpty())
            <p>No existen usuarios</p>
        @else
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cargo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usersl as $usuarioItem)
                    <tr>
                        <td>{!! $usuarioItem->cedula !!}</td>
                        <td>{!! $usuarioItem->name !!}</td>
                        <td>{!! $usuarioItem->last_name !!}</td>
                        <td>{!! $usuarioItem->cargo!!}</td>
                        <td>
                            <a href="{{ route('horarios.edit', $usuarioItem) }}">Editar</a>
                        </td>
                        <td>
                            <a href="{{ route('horarios.create', $usuarioItem) }}">Crear</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection
