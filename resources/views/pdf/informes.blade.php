<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<h2>Reporte de timbradas de usuario TIMBRADAS BIOMETRICO</h2>

    <table class="table">
        <thead>

        </thead>
        <tbody>
            <tr><td>{{{ $informe['cedula'] }}}</td></tr>
            <tr><td>{{{ $informe['nombre'] }}}</td></tr>
            <tr><td>{{{ $informe['totaltrabajado'] }}}</td></tr>
            <tr><td>{{{ $informe['dias'] }}}</td></tr>
            <tr><td>{{{ $informe['horas'] }}}</td></tr>
            <tr><td>{{{ $informe['atrasos'] }}}</td></tr>
            <tr><td>{{{ $informe['total'] }}}</td></tr>
            <tr><td>{{{ $informe['permisos'] }}}</td></tr>
            <tr><td>{{{ $informe['aprobados'] }}}</td></tr>
            <tr><td>{{{ $informe['aprobados'] }}}</td></tr>
            <tr><td>{{{ $informe['desaprobados'] }}}</td></tr>
            <tr><td>{{{ $informe['pendientes'] }}}</td></tr>
            <tr><td>{{{ $informe['reposicion'] }}}</td></tr>

        </tbody>
    </table>
</body>
</html>



