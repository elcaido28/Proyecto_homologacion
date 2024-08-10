<?php
$idv=$_REQUEST['id'];
include('conexion.php');
mysqli_query($con,"DELETE from carreras where id_carrera='$idv'");
mysqli_close($con);
header("Location:ingreso_carrera.php");

 ?>
