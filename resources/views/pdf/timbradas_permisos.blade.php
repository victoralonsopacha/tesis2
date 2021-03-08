
<!doctype html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reporte PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        @page {
            size: "A4";
            margin: 1.0cm 1.5cm 3.5cm 1.5cm;
        }
        body {
            width: 100% !important;
            height: 100%;
            background: #fff;
            color: black;
            font-size: 100%;
            font-family: 'Roboto', sans-serif;
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none; 
        }
        
    </style>
</head>
<body>
<main class="container">
<h1><p class="text-center text-uppercase">Unidad Educativa Velasco Ibarra</p></h1>    
<h1><p class="text-center text-uppercase">Parroquia de Guangopolo</p></h1>    
<h1><p class="text-center text-uppercase">Reporte de timbradas diarias de usuario</p></h1>    

 
<table class="table">
    <thead>
        <tr>
        <th scope="col">Cedula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Tiempo</th>
        <th scope="col">Fecha</th>
        <th scope="col">Observacion</th>
        </tr>
    </thead>
  <tbody>
    @foreach($consultas as $consulta)
        <tr>
            <td>{{ $consulta->cedula }}</td>
            <td>{{ $consulta->name }}</td>
            <td>{{ $consulta->last_name }}</td>
            <td>{{ $consulta->hora }}</td>
            <td>{{ $consulta->fecha }}</td>   
            <td>{{ $consulta->observacion }}</td> 
        </tr>
    @endforeach
  </tbody>
</table>

</main>
</body>
</html>
