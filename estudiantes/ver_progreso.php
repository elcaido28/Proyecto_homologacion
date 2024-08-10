<?php
session_start();
include('../conexion.php');
$cedula=$_SESSION['CEDU'];
$result= mysqli_query($con,"SELECT * from solicitantes where Cedula='$cedula'");
$row= mysqli_fetch_assoc($result);
$ano_actual=date(Y);
$ano=$ano_actual-$row['ult_ano'];
if($ano<=5){
  $result2= mysqli_query($con,"SELECT * from solicitantes S inner join homologaciones H on H.id_solicitante=S.id_solicitante left join resolucionesh RH on RH.id_homologacion=H.id_homologacion where S.Cedula='$cedula'");
  $row2= mysqli_fetch_assoc($result2);

  $salida="<img src='img/progreso_secretaria.png' alt=''>";

  if($row2['estado1']=="EN CURSO"){
    $salida="<img src='img/progreso_ProfesorD.png' alt=''>";
  }elseif($row2['estado1']=="FINALIZADA" and $row2['estado2']=="FINALIZADA" and $row2['estadoRH']!="FINALIZADA"){
  $salida="<img src='img/progreso_consejo.png' alt=''>";
}elseif($row2['estadoRH']=="FINALIZADA"){
  $salida="<img src='img/progreso_fin.png' alt=''>";
}else{
  $salida="<img src='img/progreso_secretaria.png' alt=''>";
}
}else{
  $result3= mysqli_query($con,"SELECT * from solicitantes S inner join homologaciones H on H.id_solicitante=S.id_solicitante left join resolucionesh RH on RH.id_homologacion=H.id_homologacion where S.Cedula='$cedula'");
  $row3= mysqli_fetch_assoc($result3);

  $salida="<img src='img/progreso_secretaria.png' alt=''>";

  if($row3['estado1']=="EN CURSO"){
    $salida="<img src='img/progreso_ProfesorD.png' alt=''>";
  }elseif($row3['estado1']=="FINALIZADA" and $row3['estado2']=="FINALIZADA"){
  $salida="<img src='img/progreso_consejo.png' alt=''>";
}elseif($row3['estadoRH']=="FINALIZADA"){
  $salida="<img src='img/progreso_fin.png' alt=''>";
}else{
  $salida="<img src='img/progreso_secretaria.png' alt=''>";
}
}
echo $salida;
 ?>
