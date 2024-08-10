<?php
  $idv=$_REQUEST['id'];
  include('conexion.php');

  $fecha = $_POST['fecha'];
  $Nsolicitante = $_POST['Nsolicitante'];
  $Cedula = $_POST['Cedula'];
  $Nombres = $_POST['Nombres'];
  $Apellidos = $_POST['Apellidos'];
  $Correo = $_POST['Correo'];
  $carreA = $_POST['carreA'];
  $CarreraProviene = $_POST['CarreraProviene'];
  $UniversidadProviene = $_POST['UniversidadProviene'];
  $ultimo = $_POST['utlti_ano'];
  $tipoU = $_POST['tipoU'];
  $estado = $_POST['estado'];
  $codigoU = $_POST['codigoU'];

mysqli_query($con,"UPDATE solicitantes set id_solicitante='$idv', fechaS='$fecha', NumeroS='$Nsolicitante', Cedula='$Cedula', Nombre='$Nombres', Apellido='$Apellidos', correo='$Correo', CarreraA='$carreA', carreraP='$CarreraProviene', universiP='$UniversidadProviene'
  ,ult_ano='$ultimo',tipoU='$tipoU', estado='$estado', id_usuario='$codigoU' where id_solicitante='$idv'") or die ("error".mysqli_error());

  mysqli_close($con);
  header("Location:ingreso_solicitante.php");

 ?>
