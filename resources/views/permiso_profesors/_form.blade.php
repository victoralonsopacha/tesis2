
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Fecha de Inicio:</strong>
        {!! Form::date('fecha_inicio',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <strong>Hora Inicio:</strong>
        {!! Form::time('hora_inicio', null, array('class' => 'form-control')) !!}
    </div>
        <div class="form-group">
            <strong>Fecha Fin:</strong>
            {!! Form::date('fecha_fin', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            <strong>Hora Fin:</strong>
            {!! Form::time('hora_fin', null, array('class' => 'form-control')) !!}
        </div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Tipo Permiso:</strong>
        {!! Form::select('tipo_permiso[]',$tipo_permiso, null,['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        <strong>Descripción:</strong>
        {!! Form::text('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <strong>Adjuntar Justificacion:</strong>
        <div class="alert alert-danger" role="alert">
            <strong>No olvide seleccionar un archivo adjunto si es necesario!!</strong>
        </div>
        <input type="file" class="form-control" name="file" id="file" >
    </div>

</div>
