<?php
include('conexion.php');

$Codigo = $_POST['Codigo'];
$carrera = $_POST['NombreCarrera'];

$result=mysqli_query($con,"INSERT into carreras values ('$Codigo', '$carrera')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_carrera.php");
 ?>
 
