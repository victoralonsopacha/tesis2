@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <h1>TIMBRAR Permiso</h1>

    @include('partials.validation-errors')
    <form method="POST" action="{{ route('timbrada_permisos.create') }}">
        @csrf
        

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Cedula del usuario</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="cedula" value="{{$cedula=auth()->user()->cedula}}">
            </div>
        </div>
        
        


        <button type="submit" class="btn btn-info">Timbrar</button>
    </form>

@endsection
