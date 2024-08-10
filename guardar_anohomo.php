<?php
include('conexion.php');
$codh =$_REQUEST['id'];
  $consulta3=mysqli_num_rows(mysqli_query($con,"SELECT * from anohomolo A inner join homologaciones H on A.id_homologacion=H.id_homologacion where H.id_homologacion='$codh' "));
if ($consulta3<1) {

$consulta2=mysqli_query($con,"SELECT id_anohomolo from anohomolo Order by id_anohomolo ASC");
while($row2=mysqli_fetch_array($consulta2)){
  $addID=$row2['id_anohomolo'];
  $addID+=+1;
}

$conta=99;
$consulta01=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idv' and M.semestre='SEMESTRE 1' or M.semestre='SEMESTRE 2' and H.id_homologacion='$idv'"));
if ($consulta01>=10 and $conta!=0) {
  $ano = "SEGUNDO AÑO";
  $conta=1;
}elseif ($consulta01<10 and $conta!=0) {
  $ano = "PRIMER AÑO";
  $conta=0;
}
$consulta02=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idv' and M.semestre='SEMESTRE 3' or M.semestre='SEMESTRE 4' and H.id_homologacion='$idv'"));
if ($consulta02>=10 and $conta!=0) {
  $ano = "TERCERO AÑO";
  $conta=1;
}elseif ($consulta02<10 and $conta!=0) {
  $ano = "SEGUNDO AÑO";
  $conta=0;
}
$consulta03=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idv' and M.semestre='SEMESTRE 5' or M.semestre='SEMESTRE 6' and H.id_homologacion='$idv'"));
if ($consulta03>=10 and $conta!=0) {
  $ano = "CUARTO AÑO";
  $conta=1;
}elseif ($consulta03<10 and $conta!=0) {
  $ano = "TERCERO AÑO";
  $conta=0;
}
$consulta04=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idv' and M.semestre='SEMESTRE 7' or M.semestre='SEMESTRE 8' and H.id_homologacion='$idv'"));
if ($consulta04>=10 and $conta!=0) {
  $ano = "QUINTO AÑO";
  $conta=1;
}elseif ($consulta04<10 and $conta!=0) {
  $ano = "CUARTO AÑO";
  $conta=0;
}
$consulta05=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idv' and M.semestre='SEMESTRE 9' or M.semestre='SEMESTRE 10' and H.id_homologacion='$idv'"));
if ($consulta05>=10 and $conta!=0) {
  $ano = "QUINTO AÑO";
  $conta=1;
}elseif ($consulta05<10 and $conta!=0){
  $ano = "QUINTO AÑO";
  $conta=0;
}

$cod=$addID;

$result=mysqli_query($con,"INSERT into anohomolo values ('$cod','$ano','$codh')");
mysqli_close($con);
}
header("Location:ingreso_anohomo.php?id=$codh");
 ?>
