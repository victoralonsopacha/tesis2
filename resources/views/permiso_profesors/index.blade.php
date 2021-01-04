@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <h1>GESTIONAR PERMISOS</h1>
    {{--@auth--}}
    <a href="{{ route('permiso_profesors.create') }}">Crear Permiso</a>
    {{--@endauth--}}

    @auth
    <h1>Cedula Usuario: {{auth()->user()->cedula}}</h1>        
    @endauth

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Permisos</div>
        <!-- Table -->
        @if($permisosl->isEmpty())
            <p>No existen registros</p>
        @else
            <table class="table table-responsive-md text-center">
                <thead class="thead-tomate">
                <tr>
                    <th>Cedula</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($permisosl as $permisoItem)
                    <tr>
                        <td>{!! $permisoItem->cedula !!}</td>
                        <td>{!! $permisoItem->hora_inicio !!}</td>
                        <td>{!! $permisoItem->hora_fin !!}</td>
                        <td>{!! $permisoItem->fecha_inicio!!}</td>
                        
                        <td>{!! $permisoItem->fecha_fin!!}</td>
                        <td><img width="200px" src="public/{!!$permisoItem->file!!}"></td>
                        <td>
                            <a href="{{ route('permiso_profesors.edit', $permisoItem) }}">Editar</a>
                        </td>
                        <td>
                            <a href="#">Justificación</a>
                        </td>
                        <td>
                            <form action="{{route('permiso_profesors.destroy', $permisoItem)}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                
                </tbody>
            </table>
        @endif

    </div>

@endsection
