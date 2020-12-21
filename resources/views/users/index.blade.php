@extends('layout')

@section('title', 'users')
    
@section('content')
    <h1>Users</h1>
    <a href="{{ route('users.create') }}">Crear Usuario</a>
    <ul>
        @forelse ($usersl as $userItem)
            <li><a href="{{ route('users.show', $userItem) }}">{{ $userItem->name }} <br><small>{{ $userItem->last_name }}</small></a></li>
        @empty
            <li>No hay mas usuarios</li>
        @endforelse
    </ul>
@endsection