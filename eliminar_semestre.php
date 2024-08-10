<?php
$idv=$_REQUEST['id'];
include('conexion.php');

$consulta2=mysqli_query($con,"SELECT id_carrera from semestre where id_semestre='$idv' ");
$row2=mysqli_fetch_assoc($consulta2);
$isC=$row2['id_carrera'];

mysqli_query($con,"DELETE from semestre where id_semestre='$idv'");
mysqli_close($con);
header("Location:ingreso_semestre.php?id=$isC");

 ?>
