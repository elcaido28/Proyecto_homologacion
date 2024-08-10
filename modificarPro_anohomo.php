<?php
include('conexion.php');
  $idv=$_REQUEST['id'];
  $consulta=mysqli_query($con,"SELECT * from anohomolo where id_anohomolo='$idv'");
  $row=mysqli_fetch_assoc($consulta);

  $cod = $row['id_anohomolo'];
  $ano = $_POST['ano'];
  $codh =$row['id_homologacion'];
mysqli_query($con,"UPDATE anohomolo set id_anohomolo='$cod', anohomo='$ano', id_homologacion='$codh' where id_anohomolo='$cod' ") or die ("error".mysqli_error());

  mysqli_close($con);
  header("Location:ingreso_anohomo.php?id=$codh");

 ?>
