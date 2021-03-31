
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Fecha de Inicio:</strong>
        {!! Form::date('fecha_inicio', null, array('class' => 'form-control','required')) !!}
    </div>
    <div class="form-group">
        <strong>Hora Inicio:</strong>
        <input type="time" min="07:00" max="18:30" class="form-control" name="hora_inicio" value="{{$permiso_profesor->hora_inicio}}" required>
    </div>
    <div class="form-group">
        <strong>Fecha Fin:</strong>
        {!! Form::date('fecha_fin', null, array('class' => 'form-control','required')) !!}
    </div>
    <div class="form-group">
        <strong>Hora Fin:</strong>
        <input type="time" min="07:00" max="18:30" class="form-control" name="hora_fin" value="{{$permiso_profesor->hora_fin}}" required>

    </div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Tipo Permiso:</strong>
        {!! Form::select('tipo_permiso[]',$tipo_permiso, null,['class' => 'form-control','required']); !!}
    </div>
    <div class="form-group">
        <strong>Descripción:</strong>
        {!! Form::text('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control','required')) !!}
    </div>

    <div class="form-group">
        <strong>Adjuntar Justificacion:</strong>
        <div class="alert alert-danger" role="alert">
            <strong>No olvide seleccionar un archivo adjunto si es necesario!!</strong>
        </div>
        <input type="file" class="form-control" name="file" id="file" >
    </div>

</div>
