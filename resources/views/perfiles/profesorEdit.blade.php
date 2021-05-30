@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Mi Informacion</div>
        </div>
        <a class="btn btn-primary" href="{{ route('profile.profesor') }}">Regresar</a>
        <br><br>
        @include('partials.validationError')
        @include('partials.validationMessage')

        {!! Form::model($user, ['method' => 'PATCH','route' => ['profesor.update', $user->id]]) !!}
        @csrf
        @include('perfiles.form')
        <button type="submit" class="btn btn-warning">Actualizar</button>
        {!! Form::close() !!}

    </div>
    <script>
        function soloLetras(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
            especiales="8-37-38-46-164";      
            teclado_especial=false;
            for (var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;break;
                }
            }
            if(letras.indexOf(teclado)==-1 && !teclado_especial){
                return false;
            }
        }
    </script>

@endsection
