@extends('layout')

@section('title', 'Contact')

@section('content')
    <h1>Contact</h1>


    <form method="POST" action="{{route('contact')}}">
        @csrf
    <input name="name" placeholder="Nombre.." value="{{ old('name') }}"><br>
        {!!$errors->first('name', '<small>:message</small>')!!}<br>

    <input name="email" placeholder="Email.." value="{{ old('email') }}"><br>
        {!!$errors->first('email')!!}<br>

    <input name="subject" placeholder="Asunto.." value="{{ old('subject') }}"><br>
        {!!$errors->first('subject')!!}<br>

    <textarea name="content" placeholder="Menssaje">{{ old('content') }}</textarea><br>
        {!!$errors->first('content')!!}<br>
        <button>Enviar</button><br>
        
    </form>

@endsection