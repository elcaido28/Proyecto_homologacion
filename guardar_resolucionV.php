<?php
include('conexion.php');
$cod = $_POST['codigo'];
$fecha = $_POST['fecha'];
$nvali= $_POST['Nvalida'];
$fecha2 = $_POST['fecha2'];
$estado = $_POST['estado2'];
$codU = $_POST['codigoU'];
$codS = $_POST['id_valida'];

$result=mysqli_query($con,"INSERT into resolucionesv values ('$cod','$fecha','$nvali','$fecha2', '$estado', '$codS', '$codU')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:informe_valida_resolucion.php?id=$cod");
 ?>
