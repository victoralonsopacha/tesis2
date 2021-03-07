@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid">
    <h1>DIAS DE REPOSICION</h1>
    @include('partials.validationMessage')

    <div class="panel panel-default">
        <!-- Default panel contents -->

        <div class="panel-heading">Usuario: {{$user->name.' '.$user->last_name}}</div>
        <!-- Table -->

        <table class="table table-responsive-md text-center">
            <thead class="thead-tomate">
            <tr>
                <th>Nr.</th>
                <th>Hora Propuesta</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
            </thead>
            @php
            $i=1;
            @endphp
            @foreach ($consulta as $reposicion)
            <tbody>
                <tr>
                    <td>{{$i++ }}</td>
                    <td>{{ $reposicion->horas }}</td>
                    <td>{{ $reposicion->fecha }}</td>
                    @if($reposicion->estado == '0')
                        <td>
                            <form action="{{route('tiempo_reposicions.active', $reposicion->id)}}" method="POST">
                                @csrf @method('PATCH')
                                <button class="btn btn-success btn-xs">
                                    <span aria-hidden="true" class="glyphicon glyphicon-ok"></span></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('tiempo_reposicions.desactive', $reposicion->id)}}" method="POST">
                                @csrf @method('PATCH')
                                <button class="btn btn-danger btn-xs" onclick="return confirm('¿Seguro que deseas desactivar este usuario?')">
                                    <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></button>
                            </form>
                        </td>
                    @elseif($reposicion->estado == '0')
                    @endif

            </tbody>



        @endforeach

    </table>
    </div>
    <a class="btn btn-primary" href="{{ route('tiempo_reposicions.index_inspector') }}">Regresar</a>
    </div>
@endsection
