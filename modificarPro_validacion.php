<?php
  include('conexion.php');
  $cod=$_POST['codigo'];
  $Fecha = $_POST['fecha'];
  $Noficio = $_POST['Nvalida'];
  $estado =$_POST['estado2'];
  $estado2 = $_POST['estado'];
  $id_solic = $_POST['id_solicitante'];
  $codigoU = $_POST['codigoU'];

mysqli_query($con,"UPDATE validaciones set id_validacion='$cod', fechaV='$Fecha', numeroV='$Noficio', estadoV='$estado', estadoR='$estado2', id_usuario='$codigoU' , id_solicitante='$id_solic' where id_validacion='$cod'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_validacion.php?id=$id_solic");

 ?>
