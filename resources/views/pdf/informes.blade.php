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
<h1><p class="text-center text-uppercase">Reporte de timbradas de permisos de usuario</p></h1>


<table class="table">

    <tbody>
            <tr>
                <td>Cédula: <label for="">{{{ $informe['cedula'] }}}</label></td>
                <td>
                    <p>Nombre: <label for="">{{{ $informe['nombre'] }}}</label></p>
                    <p>Apellido: <label for="">{{{ $informe['apellido'] }}}</label></p>    
                </td>
            </tr>
    </tbody>
</table>



<table class="table">
    <thead>
        <tr>
            <th scope="col">Horas totales trabajadas</th>
            <th scope="col">Días totales trabajados</th>
            <th scope="col">Atrasos</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{{ $informe['totaltrabajado'] }}}</td>
            <td>{{{ $informe['dias'] }}}</td>
            <td>{{{ $informe['atrasos'] }}}</td>
        </tr>
    </tbody>
</table>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Horas totales de permisos</th>
            <th scope="col">Cantidad de permisos aprobados</th>
            <th scope="col">Cantidad de permisos rechazados</th>
            <th scope="col">Cantidad de permisos pendientes</th>
            <th scope="col">Cantidad de tiempo de reposición</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{{ $informe['permisos'] }}}</td>
            <td>{{{ $informe['aprobados'] }}}</td>
            <td>{{{ $informe['desaprobados'] }}}</td>
            <td>{{{ $informe['pendientes'] }}}</td>
            <td>{{{ $informe['reposicion'] }}}</td>
        </tr>
    </tbody>
</table>

</main>
</body>
</html>
