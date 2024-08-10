<?php
include('conexion.php');

$Codigo = $_POST['Codigo'];
$cargo = $_POST['Nombrecargo'];

$result=mysqli_query($con,"INSERT into cargos values ('$Codigo', '$cargo')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_cargo.php");
 ?>
