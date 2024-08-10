<?php
  $idv=$_REQUEST['id'];
  include('conexion.php');
  $Codigo = $_POST['Codigo'];
  $Fecha = $_POST['Fecha'];
  $Noficio = $_POST['Noficio'];
  $observacion = $_POST['observacion'];
  $estado = $_POST['estado'];
  $estado2 = $_POST['estado2'];
  $id_solic = $_POST['id_solicitud'];
  $codigoU = $_POST['codigoU'];

mysqli_query($con,"UPDATE homologaciones set id_homologacion='$Codigo', fechaH='$Fecha', numero_ofi='$Noficio', observacion='$observacion', estado1='$estado', estado2='$estado2', id_solicitante='$id_solic', id_usuario='$codigoU' where id_homologacion='$idv'") or die ("error".mysqli_error());

  mysqli_close($con);
  header("Location:ingreso_homologa1.php?id=$id_solic");

 ?>
