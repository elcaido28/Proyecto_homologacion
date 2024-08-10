<?php
  include('conexion.php');
  $cod = $_POST['codigo'];
  $fecha = $_POST['fecha'];
  $nvali= $_POST['Nvalida'];
    $fecha2 = $_POST['fecha2'];
  $estado = $_POST['estado2'];
  $codU = $_POST['codigoU'];
  $codS = $_POST['id_homolo'];

mysqli_query($con,"UPDATE resolucionesh set id_resolucionh='$cod',fechaRH='$fecha',numeroRH='$nvali',fechaCons='$fecha2', estadoRH='$estado', id_homologacion='$codS', id_usuario='$codU' where id_resolucionh='$cod'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_resolucionH.php?id=$codS");

 ?>
