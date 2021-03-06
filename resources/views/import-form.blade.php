@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
    <section style="padding-top:60px">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Importar Excel
                    </div>
                    @include('partials.validation-error)
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('import')}}">
                            @csrf
                            <div class="form-group">
                                <label for="file">Escoja xlsx</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Cargar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
 @endsection
