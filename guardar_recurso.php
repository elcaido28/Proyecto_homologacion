<?php
include('conexion.php');
$cod = $_POST['Codigo'];
$adm = $_POST['admin'];
$secre= $_POST['secre'];
$prof = $_POST['ProfeD'];
$secreC = $_POST['secreC'];
$codU = $_POST['Codigo2'];

$result=mysqli_query($con,"INSERT into recursos values ('$cod','$adm','$secre', '$prof', '$secreC', '$codU')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_usuario.php");
 ?>
