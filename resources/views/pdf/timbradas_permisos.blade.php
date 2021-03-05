<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        .table {
            width: 100%;
            border: 1px solid #999999;
        }
    </style>
</head>
<body>


<h1>ESCUELA VELASCO IBARRA</h1>    
        <h2>Reporte de timbradas de usuario TIMBRADAS PERMISOS</h2> 
 
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Cedula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Tiempo</th>
        <th scope="col">Fecha</th>
        </tr>
    </thead>
  <tbody>
    @foreach($consultas as $consulta)
        <tr>
            <th scope="row">1</th>
            <td>{{ $consulta->cedula }}</td>
            <td>{{ $consulta->name }}</td>
            <td>{{ $consulta->last_name }}</td>
            <td>{{ $consulta->tiempo }}</td>
            <td>{{ $consulta->fecha }}</td>   
        </tr>
    @endforeach
  </tbody>
</table>


</body>
</html>



