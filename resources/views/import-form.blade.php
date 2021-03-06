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

                        @if ( $errors->any() )
                            <div class="alert alert-danger">
                                @foreach( $errors->all() as $error )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form id="formularioExcel" method="POST" enctype="multipart/form-data" action="{{route('import')}}">
                            @csrf
                            <div class="form-group">
                                <label for="file">Escoja un archivo con extensión .xlsx</label>
                                <input id="file" type="file" name="file" class="form-control" accept="*/xlsx">
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("formularioExcel").addEventListener('submit', validarExtensiones);
        });

        function validarExtensiones(evento) {
            evento.preventDefault();
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(.xlsx)$/i;
            if(!allowedExtensions.exec(filePath)){
                alert('Por favor seleccione un archivo con extensión .xlsx');
                fileInput.value = '';
                return false;
            }else{
                this.submit();
            }
        }
    </script>
 @endsection
