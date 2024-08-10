<?php
  $idv=$_REQUEST['id'];
    include('conexion.php');
  $consulta=mysqli_query($con,"SELECT * from homologaciones where id_homologacion='$idv'");
  $row=mysqli_fetch_assoc($consulta);

  $Fecha = $row['fechaH'];
  $Noficio = $row['numero_ofi'];
  $observacion = $row['observacion'];
  $estado = $row['estado1'];
  $estado2 = $_POST['estado2'];
  $id_solic = $row['id_solicitante'];
  $codigoU = $row['id_usuario'];

mysqli_query($con,"UPDATE homologaciones set id_homologacion='$idv', fechaH='$Fecha', numero_ofi='$Noficio', observacion='$observacion', estado1='$estado', estado2='$estado2', id_solicitante='$id_solic', id_usuario='$codigoU' where id_homologacion='$idv'") or die ("error".mysqli_error());

  mysqli_close($con);
  header("Location:lista_homologaciones.php");

 ?>
