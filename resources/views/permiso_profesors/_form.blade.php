    <div class="form-group row">

        <label for="staticEmail" class="col-sm-2 col-form-label">Cedula del usuario</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="cedula" value="{{$cedula=auth()->user()->cedula}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha de inicio</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="fecha_inicio" value="{{old('fecha_inicio', $permiso_profesor->fecha_inicio)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Fin</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="fecha_fin" value="{{old('fecha_fin', $permiso_profesor->fecha_fin)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Hora Inicio</label>
        <div class="col-sm-6">
            <input type="time" class="form-control" name="hora_inicio" value="{{old('hora_inicio', $permiso_profesor->hora_inicio)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Hora Fin</label>
        <div class="col-sm-6">
            <input type="time" class="form-control" name="hora_fin" value="{{old('hora_fin', $permiso_profesor->hora_fin)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="descripcion" value="{{old('descripcion', $permiso_profesor->descripcion)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tipo Permiso</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="tipo_permiso" value="{{old('tipo_permiso', $permiso_profesor->tipo_permiso)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Archivo Adjunto</label>
        <div class="col-sm-6">
            <input type="file" class="form-control" name="file" value="{{old('file', $permiso_profesor->file)}}">
        </div>
    </div>


