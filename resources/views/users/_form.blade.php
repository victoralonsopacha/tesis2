<label for="">
    Nombre del usuario
    <input type="text" name="name" value="{{ old('name', $user->name) }}">
</label>
<br>
<label for="">
    Apellido del usuario
    <input type="text" name="last_name" value="{{old('last_name', $user->last_name)}}">
</label>
<br>
<label for="">
    Email del usuario
    <input type="email" name="email" value="{{old('email', $user->email)}}">
</label>
<br>
<label for="">
    Pass del usuario
    <input type="password" name="password" value="{{old('password', $user->password)}}">
</label>
<br>
<label for="">
    Cedula del usuario
    <input type="text" name="cedula" value="{{old('cedula', $user->cedula)}}">
</label>
<br>
<label for="">
    Tipo relacion laboral del usuario
    <input type="text" name="tipo_relacion_laboral" value="{{old('tipo_relacion_laboral', $user->tipo_relacion_laboral)}}">
</label>
<br>
<label for="">
    Cargo del usuario
    <input type="text" name="cargo" value="{{old('cargo', $user->cargo)}}">
</label>
<br>
<label for="">
    Fecha de ingreso del usuario
    <input type="date" name="fecha_ingreso" value="{{old('fecha_ingreso', $user->fecha_ingreso)}}">
</label>
<br>
