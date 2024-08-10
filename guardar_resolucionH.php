<?php
include('conexion.php');
$cod = $_POST['codigo'];
$fecha = $_POST['fecha'];
$fecha2 = $_POST['fecha2'];
$nvali= $_POST['Nvalida'];
$estado = $_POST['estado2'];
$codU = $_POST['codigoU'];
$codS = $_POST['id_homolo'];

$result=mysqli_query($con,"INSERT into resolucionesh values ('$cod','$fecha','$nvali','$fecha', '$estado', '$codS', '$codU')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:informe_homolo_resolucion.php?id=$cod");
 ?>
