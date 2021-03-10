<table>
    <thead>
    <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fecha</th>
        <th>Hora</th>
    </tr>
    </thead>
    <tbody>
    @foreach($consultas as $consulta)
        <tr>
            <td>{{ $consulta->cedula }}</td>
            <td>{{ $consulta->name }}</td>
            <td>{{ $consulta->last_name }}</td>
            <td>{{ $consulta->fecha }}</td>
            <td>{{ $consulta->hora }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
