<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Nombres:</strong>
            {!! Form::text('name', null, array('onkeypress'=>'return soloLetras(event)','class' => 'form-control','required')) !!}
        </div>
        <div class="form-group">
            <strong>Apellidos:</strong>
            {!! Form::text('last_name', null, array('onkeypress'=>'return soloLetras(event)','class' => 'form-control','required')) !!}
        </div>
        <div class="form-group">

            <strong>Cédula:</strong>
            {!! Form::text('cedula', null, array('onkeypress'=>'return soloNumeros(event)','class' => 'form-control','required','maxlength'=>'10')) !!}
            @if ($errors->has('cedula'))
                <div class="help-block with-errors">
                    <strong>{{ $errors->first('cedula') }}</strong>
                </div>
            @endif
        
        </div>
        <div class="form-group">
            <strong>Contraseña:</strong>
            {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control','minlength'=>'6')) !!}
            <div class="help-block">Mínimo de 6 caracteres</div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control','required')) !!}
        </div>
        <div class="form-group">
            <strong>Tipo Relación Laboral:</strong>
            {!! Form::select('tipo_relacion_laboral[]', $tipo_relacion_laboral, null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Jornada:</strong>
            {!! Form::select('jornada[]', $jornada, null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Rol:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Fecha de Ingreso:</strong>
            {!! Form::date('fecha_ingreso', null,['class' => 'form-control']) !!}
        </div>
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
        function soloNumeros(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key).toLowerCase();
            letras = "0123456789",
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
</div>

