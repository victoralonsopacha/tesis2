<div class="panel panel-default">
    <div class="panel-heading">Permisos Aprobados</div>
    <table class="table table-responsive-md text-center">
        <thead class="thead-tomate">
        <tr>
            <th>Nr.</th>
            <th>Fecha Inicio</th>
            <th>Hora Inicio</th>
            <th>Fecha Finalizacion</th>
            <th>Fecha Finalizacion</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permisos as $permisoItem)
            <tr>
                <td>{!! $i++ !!}</td>
                <td>{!! $permisoItem->fecha_inicio!!}</td>
                <td>{!! $permisoItem->hora_inicio !!}</td>
                <td>{!! $permisoItem->fecha_fin !!}</td>
                <td>{!! $permisoItem->hora_fin !!}</td>
                <td>
                    <a href="{{ route('permiso_profesors.show', $permisoItem) }}" class="btn btn-xs btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
