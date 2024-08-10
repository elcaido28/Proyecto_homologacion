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

mysqli_query($con,"UPDATE mallas set id_malla='$cod',Periodo='$peri',semestre='$seme', Materia='$mate', horas='$hora', id_carrera='$codC' where id_malla='$cod'") or die ("error".mysqli_error());

  mysqli_close($con);
  header("Location:ingreso_malla.php");

 ?>
