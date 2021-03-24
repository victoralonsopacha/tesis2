@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Importar Excel
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{route('import')}}">
                                @csrf
                                <div class="form-group">
                                    <div class="alert alert-info" role="alert">
                                        Archivo Importado con Exito!
                                      </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
