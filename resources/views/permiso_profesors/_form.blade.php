<div class="col-xs-6 col-sm-6 col-md-6">
    @foreach($usuario as $itemUsuario)

        <div class="form-group">
            <strong>Cedula :</strong>
            <input type="text" class="form-control" name="cedula" value="{{ old('cedula', $itemUsuario->cedula) }}" readonly>
        </div>
        <div class="form-group">
            <strong>Nombre :</strong>
            <input type="text" class="form-control" name="name" value="{{ old('name', $itemUsuario->name) }}" readonly>

        </div>
        <div class="form-group">
            <strong>Apellido:</strong>
            <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $itemUsuario->last_name) }}" readonly>
        </div>
    @endforeach
    <div class="form-group">
        <strong>Fecha de Inicio:</strong>
        {!! Form::date('fecha_inicio',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <strong>Hora Inicio:</strong>
        {!! Form::time('hora_inicio', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Fecha Fin:</strong>
        {!! Form::date('fecha_fin', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <strong>Hora Fin:</strong>
        {!! Form::time('hora_fin', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        <strong>Tipo Permiso:</strong>
        {!! Form::select('tipo_permiso[]',$tipo_permiso, null,['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        <strong>Descripcion:</strong>
        {!! Form::text('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        <strong>Adjuntar Justificacion:</strong>
        {!! Form::file('file', null, array('class' => 'form-control')) !!}
    </div>

</div>
