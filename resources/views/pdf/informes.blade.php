<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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



    


    <form>
    <P>RESUMEN DE HORAS TRABAJADAS</P>
  <p>Cedula: <label for="">{{{ $informe['cedula'] }}}</label></p>
  <p>Nombre: <label for="">{{{ $informe['nombre'] }}}</label></p>

  <p>Horas totales trabajadas: <label for="">{{{ $informe['totaltrabajado'] }}}</label></p>

  <p>Dias totales trabajados: <label for="">{{{ $informe['dias'] }}}</label></p>
  <p>Atrasos: <label for="">{{{ $informe['atrasos'] }}}</label></p>
  <p>PERMISOS</p>
  <p>Horas totaes de permisos: <label for="">{{{ $informe['permisos'] }}}</label></p>
  <p>Horas totaes de permisos: <label for="">{{{ $informe['aprobados'] }}}</label></p>
  <p>Horas totaes de permisos: <label for="">{{{ $informe['desaprobados'] }}}</label></p>
  <p>Horas totaes de permisos: <label for="">{{{ $informe['pendientes'] }}}</label></p>
  <p>Horas totaes de permisos: <label for="">{{{ $informe['reposicion'] }}}</label></p>

</form>
    
</body>
</html>



