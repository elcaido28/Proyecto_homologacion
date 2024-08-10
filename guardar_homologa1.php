<?php
include('conexion.php');

$Codigo = $_POST['Codigo'];
$Fecha = $_POST['Fecha'];
$Noficio = $_POST['Noficio'];
$id_solic = $_POST['id_solicitud'];
$observacion = $_POST['observacion'];
$estado = $_POST['estado'];
$estado2 = $_POST['estado2'];
$codigoU = $_POST['codigoU'];


$result=mysqli_query($con,"INSERT into homologaciones values ('$Codigo', '$Fecha', '$Noficio', '$observacion', '$estado', '$estado2', '$id_solic', '$codigoU')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_homologa2.php?id=$id_solic");
 ?>
