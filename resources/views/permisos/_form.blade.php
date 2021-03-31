    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Cédula del usuario</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="cedula" value="{{ old('cedula', $permiso->cedula) }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha de inicio</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="fecha_inicio" value="{{old('fecha_inicio', $permiso->fecha_inicio)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Fin</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="fecha_fin" value="{{old('fecha_fin', $permiso->fecha_fin)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Hora Inicio</label>
        <div class="col-sm-6">
            <input type="time" class="form-control" name="hora_inicio" value="{{old('hora_inicio', $permiso->hora_inicio)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Hora Fin</label>
        <div class="col-sm-6">
            <input type="time" class="form-control" name="hora_fin" value="{{old('hora_fin', $permiso->hora_fin)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="descripcion" value="{{old('descripcion', $permiso->descripcion)}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tipo Permiso</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="tipo_permiso" value="{{old('tipo_permiso', $permiso->tipo_permiso)}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
            <input type="hidden" class="form-control" name="file" value="{{old('file', $permiso->file)}}">

        </div>
    </div>



