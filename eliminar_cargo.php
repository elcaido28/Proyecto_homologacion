<?php
$idv=$_REQUEST['id'];
include('conexion.php');
mysqli_query($con,"DELETE from cargos where id_cargo='$idv'");
mysqli_close($con);
header("Location:ingreso_cargo.php");

 ?>
