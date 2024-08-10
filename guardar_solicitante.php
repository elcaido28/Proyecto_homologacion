<?php
include('conexion.php');

$Codigo = $_POST['Codigo'];
$fecha = $_POST['fecha'];
$Nsolicitante = $_POST['Nsolicitante'];
$Cedula = $_POST['Cedula'];
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$Correo = $_POST['Correo'];
$carreA = $_POST['carreA'];
$CarreraProviene = $_POST['CarreraProviene'];
$UniversidadProviene = $_POST['UniversidadProviene'];
$ultimo = $_POST['utlti_ano'];
$tipoU = $_POST['tipoU'];
$estado = $_POST['estado'];
$codigoU = $_POST['codigoU'];

$result=mysqli_query($con,"INSERT into solicitantes values ('$Codigo', '$fecha', '$Nsolicitante', '$Cedula', '$Nombres', '$Apellidos', '$Correo', '$carreA', '$CarreraProviene', '$UniversidadProviene'
  ,'$ultimo','$tipoU', '$estado', '$codigoU')") or die ("error".mysqli_error());

$result2=mysqli_query($con,"INSERT into estudiante (nom_ns_usu, clave_cedula) values ('$Nsolicitante', '$Cedula')") or die ("error".mysqli_error());

mysqli_close($con);
header("Location:ingreso_solicitante.php");
 ?>
