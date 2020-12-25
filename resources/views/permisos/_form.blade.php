<label for="">
    Cedula del usuario
    <input type="text" name="cedula" value="{{ old('cedula', $permiso->cedula) }}">
</label>
<br>
<label for="">
    Fecha de Inicio
    <input type="date" name="fecha_inicio" value="{{old('fecha_inicio', $permiso->fecha_inicio)}}">
</label>
<br>
<label for="">
    Fecha Fin
    <input type="date" name="fecha_fin" value="{{old('fecha_fin', $permiso->fecha_fin)}}">
</label>
<br>
<label for="">
    Hora Inicio
    <input type="time" name="hora_inicio" value="{{old('hora_inicio', $permiso->hora_inicio)}}">
</label>
<br>
<label for="">
    Hora Fin
    <input type="time" name="hora_fin" value="{{old('hora_fin', $permiso->hora_fin)}}">
</label>
<br>
<label for="">
    Descripcion
    <input type="text" name="descripcion" value="{{old('descripcion', $permiso->descripcion)}}">
</label>
<br>
<label for="">
    Tipo de permiso
    <input type="text" name="tipo_permiso" value="{{old('tipo_permiso', $permiso->tipo_permiso)}}">
</label>
