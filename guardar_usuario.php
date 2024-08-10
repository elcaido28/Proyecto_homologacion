<?php
include('conexion.php');

$Codigo = $_POST['Codigo'];
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$NombresUsu = $_POST['NombresUsu'];
$claveUsu = $_POST['claveUsu'];
$estado = $_POST['estado'];
$codigoC = $_POST['codigoC'];
$codigoCa = $_POST['codigoCa'];

$result=mysqli_query($con,"INSERT into usuarios values ('$Codigo', '$Nombres', '$Apellidos', '$NombresUsu', '$claveUsu', '$estado', '$codigoC', '$codigoCa')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_usuario.php");
 ?>
