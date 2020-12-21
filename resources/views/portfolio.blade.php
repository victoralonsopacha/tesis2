@extends('layout')

@section('title', 'vacaciones')

@section('content')
    <h1>Vacaciones</h1>

    <ul>
        @forelse ($portfolio as $portfolioItem)
            <li>{{$portfolioItem['title']}}</li>
            @empty
                <li>No hay mas proyectos</li>        
        @endforelse       
    </ul>

@endsection