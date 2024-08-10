<?php
include('conexion.php');
$cod = $_POST['codigo'];
$fecha = $_POST['fecha'];
$nvali= $_POST['Nvalida'];
$estado = $_POST['estado2'];
$estadoR = $_POST['estado'];
$codU = $_POST['codigoU'];
$codS = $_POST['id_solicitante'];

$result=mysqli_query($con,"INSERT into validaciones values ('$cod','$fecha','$nvali', '$estado','$estadoR', '$codU', '$codS')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:informe_validacionC.php?id=$cod");
 ?>
