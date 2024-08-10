<?php
  $idv=$_REQUEST['id'];
  include('conexion.php');

  $Codigo = $_POST['Codigo'];
  $Nombres = $_POST['Nombres'];
  $Apellidos = $_POST['Apellidos'];
  $NombresUsu = $_POST['NombresUsu'];
  $claveUsu = $_POST['claveUsu'];
  $estado = $_POST['estado'];
  $codigoC = $_POST['codigoC'];
  $codigoCa = $_POST['codigoCa'];

mysqli_query($con,"UPDATE usuarios set id_usuario='$idv', nombreU='$Nombres', apellidoU='$Apellidos', nombre_usus='$NombresUsu', clave_usu='$claveUsu', estado='$estado'
  ,id_carrera='$codigoC', id_cargo='$codigoCa' where id_usuario='$idv'") or die ("error".mysqli_error());

mysqli_close($con);
header("Location:ingreso_usuario.php");
 ?>
