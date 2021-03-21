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
<h1>Unidad Educativa Velasco Ibarra</h1>
<h2>Parroquia de Guangopolo</h2>
<h2>Reporte de timbradas de usuario provenientes del biométrico</h2>



    


    <form>
    <P>Resumen de horas trabajadas</P>
  <p>Cédula: <label for="">{{{ $informe['cedula'] }}}</label></p>
  <p>Nombre: <label for="">{{{ $informe['nombre'] }}}</label></p>

  <p>Horas totales trabajadas: <label for="">{{{ $informe['totaltrabajado'] }}}</label></p>

  <p>Días totales trabajados: <label for="">{{{ $informe['dias'] }}}</label></p>
  <p>Atrasos: <label for="">{{{ $informe['atrasos'] }}}</label></p>
  <p>Permisos</p>
  <p>Horas totaes de permisos: <label for="">{{{ $informe['permisos'] }}}</label></p>
  <p>Cantidad de permisos aprobados: <label for="">{{{ $informe['aprobados'] }}}</label></p>
  <p>Cantidad de permisos desaprobados: <label for="">{{{ $informe['desaprobados'] }}}</label></p>
  <p>Cantidad de permisos pendientes: <label for="">{{{ $informe['pendientes'] }}}</label></p>
  <p>Cantidad de tiempo de reposición: <label for="">{{{ $informe['reposicion'] }}}</label></p>

</form>
    
</body>
</html>



