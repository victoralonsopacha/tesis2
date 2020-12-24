@extends('layout')

@section('title', 'permisos')
    
@section('content')
    <h1>Permisos</h1>
    {{--@auth--}}
        <a href="{{ route('permisos.create') }}">Crear Permiso</a>
    {{--@endauth--}}
    
    <ul>
        @forelse ($permisosl as $permisoItem)
            <li><a href="{{ route('permisos.show', $permisoItem) }}">{{ $permisoItem->cedula }} <br><small>{{ $permisoItem->hora_inicio }}</small>
                <br><small>{{ $permisoItem->hora_fin }}</small>
                <br><small>{{ $permisoItem->fecha_inicio }}</small>
                <br><small>{{ $permisoItem->fecha_fin }}</small>
                
            </a></li>
        @empty
            <li>No hay mas permisos</li>
        @endforelse
    </ul>
@endsection