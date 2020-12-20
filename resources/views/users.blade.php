@extends('layout')

@section('title', 'users')
    
@section('content')
    <h1>Users</h1>

    <ul>
        @forelse ($usersl as $userItem)
            <li>{{ $userItem->name }} <br><small>{{ $userItem->last_name }}</small> </li>
        @empty
        <li>No hay mas usuarios</li>
        @endforelse
    </ul>
@endsection