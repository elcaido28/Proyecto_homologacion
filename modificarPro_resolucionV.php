<?php
  include('conexion.php');
  $cod = $_POST['codigo'];
  $fecha = $_POST['fecha'];
  $nvali= $_POST['Nvalida'];
  $fecha2 = $_POST['fecha2'];
  $estado = $_POST['estado2'];
  $codU = $_POST['codigoU'];
  $codS = $_POST['id_valida'];

mysqli_query($con,"UPDATE resolucionesv set id_resolucionv='$cod',fechaRV='$fecha',numeroRV='$nvali',fechaCons='$fecha2', estadoRV='$estado', id_validacion='$codS', id_usuario='$codU' where id_resolucionv='$cod'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_resolucionV.php?id=$codS");

 ?>
