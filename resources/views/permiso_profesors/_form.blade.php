<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Fecha de Inicio:</strong>
        {!! Form::date('fecha_inicio',\Carbon\Carbon::now(),['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <strong>Fecha Fin:</strong>
        {!! Form::date('fecha_fin', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        <strong>Hora Inicio:</strong>
        {!! Form::time('hora_inicio', \Carbon\Carbon::now(), array('class' => 'form-control')) !!}
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
        <strong>Descripcion:</strong>
        {!! Form::text('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        <strong>Adjuntar Justificacion:</strong>
        {!! Form::file('file', null, array('class' => 'form-control')) !!}
    </div>
</div>
</div>




