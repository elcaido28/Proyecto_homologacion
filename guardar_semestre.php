<?php
include('conexion.php');

$Codigo = $_POST['Codigoid'];
$ns = $_POST['NumeroSemestre'];

for ($i=1; $i <= $ns; $i++) {

  $consulta2=mysqli_query($con,"SELECT id_semestre from semestre Order by id_semestre ASC");
  while($row2=mysqli_fetch_array($consulta2)){
    $addID=$row2['id_semestre'];
  if ($addID==0 or $addID=="") {
    $addID=1; }
  else{
    $addID+=+1;
  }}
$seme="Semestre ".$i;

$result=mysqli_query($con,"INSERT into semestre values ('$addID', '$seme', '$Codigo')") or die ("error".mysqli_error());
}
mysqli_close($con);
header("Location:ingreso_semestre.php?id=$Codigo");
 ?>
