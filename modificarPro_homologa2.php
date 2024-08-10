<?php
  include('conexion.php');
  $Codigo = $_POST['Codigo'];
  $cali = $_POST['Calificacion'];
  $hora = $_POST['Horas'];
  $id_m = $_POST['id_malla'];
  $id_h= $_POST['id_homolo'];
mysqli_query($con,"UPDATE malla_homolo set id_malla_homo ='$Codigo', calificacion='$cali', horas='$hora', id_malla='$id_m', id_homologacion='$id_h' where id_malla_homo='$Codigo'") or die ("error".mysqli_error());

  mysqli_close($con);
  header("Location:ingreso_homologa2.php");

?>
