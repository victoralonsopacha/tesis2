<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Nombres:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Apellidos:</strong>
            {!! Form::text('last_name', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Cedula:</strong>
            {!! Form::text('cedula', null, array('placeholder' => 'Cedula','class' => 'form-control','readonly')) !!}
        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <strong>Contraseña:</strong>
            {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','readonly')) !!}
        </div>
        <div class="form-group">
            <strong>Tipo Relacion Laboral:</strong>
            {!! Form::select('tipo_relacion[]', $tipo_relacion,'',['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
            <strong>Rol:</strong>
            {!! Form::select('roles[]',$userRole,null, array('class' => 'form-control','readonly')) !!}
        </div>
        <div class="form-group">
            <strong>Fecha de Ingreso:</strong>
            {!! Form::date('fecha_ingreso', null,['class' => 'form-control','readonly']) !!}
        </div>
    </div>
</div>
