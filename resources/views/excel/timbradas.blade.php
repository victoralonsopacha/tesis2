<table>
    <thead>
    <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Tiempo</th>
        <th>Fecha</th>
    </tr>
    </thead>
    <tbody>
    @foreach($consultas as $consulta)
        <tr>
            <td>{{ $consulta->cedula }}</td>
            <td>{{ $consulta->nombre }}</td>
            <td>{{ $consulta->tiempo }}</td>
            <td>{{ $consulta->fecha }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
