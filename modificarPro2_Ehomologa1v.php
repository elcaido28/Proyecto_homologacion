<?php
  $idv=$_REQUEST['id'];
    include('conexion.php');
  $consulta=mysqli_query($con,"SELECT * from validaciones where id_validacion='$idv'");
  $row=mysqli_fetch_assoc($consulta);

  $Fecha = $row['fechaV'];
  $Noficio = $row['numeroV'];
  $estado = $row['estadoV'];
  $estado2 = $_POST['estado2'];
  $id_solic = $row['id_solicitante'];
  $codigoU = $row['id_usuario'];

mysqli_query($con,"UPDATE validaciones set id_validacion='$idv', fechaV='$Fecha', numeroV='$Noficio', estadoV='$estado', estadoR='$estado2', id_usuario='$codigoU' , id_solicitante='$id_solic' where id_validacion='$idv'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:lista_homologaciones.php");

 ?>
