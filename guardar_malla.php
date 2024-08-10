<?php
session_start();
include('conexion.php');

 $carre=$_SESSION['CA'];
$consulta4=mysqli_query($con,"SELECT id_carrera from  carreras where nombreC='$carre'");
$row4=mysqli_fetch_assoc($consulta4);

$cod = $_POST['Codigo'];
$peri = $_POST['Periodo'];
$seme= $_POST['semestre'];
$mate = $_POST['Materia'];
$hora = $_POST['Horas'];
$codC = $row4['id_carrera'];

$consulta1=mysqli_query($con,"SELECT id_malla from  mallas M INNER JOIN carreras C on C.id_carrera=M.id_carrera where M.Materia='$mate' and C.id_carrera='$codC' AND M.Periodo='$peri'");
$row1=mysqli_fetch_assoc($consulta1);
if (empty($row1['id_malla'])) {
  $result=mysqli_query($con,"INSERT into mallas values ('$cod','$peri','$seme', '$mate', '$hora', '$codC')") or die ("error".mysqli_error());
}


mysqli_close($con);
header("Location:ingreso_malla.php");
 ?>
