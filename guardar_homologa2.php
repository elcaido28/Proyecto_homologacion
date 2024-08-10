<?php
include('conexion.php');

$codm = $_POST['codm'];
$codh= $_POST['codh'];
$nota = $_POST['nota'];
$hora = $_POST['hora'];

$result=mysqli_query($con,"INSERT into malla_homolo (calificacion, horas, id_malla, id_homologacion) values ('$nota', '$hora', '$codm', '$codh')") or die ("error".mysqli_error());
mysqli_close($con);

 ?>
