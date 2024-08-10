<?php
include('TD_reporte_vertical.php');
include('conexion.php');


$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(60,35);
$pdf->Cell(90,10,'REPORTE DE MATERIAS HOMOLOGADAS',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

if (isset($_POST['otraB'])) {
$otra=$_POST['otraB'];
$usup=$_POST['NombreEmpleado'];
}


$consultaf=mysqli_query($con,"SELECT DISTINCT M.Periodo from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where U.id_usuario='$usup' ORDER BY Periodo DESC");
while($rowf= mysqli_fetch_array($consultaf)){
$periodoF=$rowf['Periodo'];

  $consulta1=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 1' and M.Periodo='$periodoF'");
    $consulta2=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 2' and M.Periodo='$periodoF'");

$numR1=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 1' and M.Periodo='$periodoF'"));
$numR2=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 2' and M.Periodo='$periodoF'"));
if($numR1>=1 or $numR2>=1){

$pdf->SetFont('arial','B',10);
  $pdf->Cell(190,10,utf8_decode('PRIMER AÑO'),0,1,'C');
   $y=$pdf->GetY();
   $pdf->SetXY(-190,$y+2);
   $pdf->SetFont('arial','B',8);
   $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
   $pdf->Cell(50,10,'MATERIA',1,0,'C');
   $pdf->Cell(12,10,'HORAS',1,0,'C');
   $pdf->Cell(6,10,'',0,0,'C');
   $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
   $pdf->Cell(50,10,'MATERIA',1,0,'C');
   $pdf->Cell(12,10,'HORAS',1,1,'C');
   $pdf->SetFont('arial','B',7);
   $y2=$pdf->GetY();
   while($row1= mysqli_fetch_array($consulta1)){
     $y=$pdf->GetY();
     $pdf->SetXY(-190,$y);
   $pdf->Cell(22,5,$row1['semestre'],1,0,'L');
   $pdf->Cell(50,5,$row1['Materia'],1,0,'C');
   $pdf->Cell(12,5,utf8_decode($row1['horas']),1,1,'C');
   }
   $y4=$pdf->GetY();
   $pdf->SetXY(110,$y2);
   while($row2= mysqli_fetch_array($consulta2)){
       $y=$pdf->GetY();

     $pdf->SetXY(110,$y);
   $pdf->Cell(22,5,$row2['semestre'],1,0,'L');
   $pdf->Cell(50,5,$row2['Materia'],1,0,'C');
   $pdf->Cell(12,5,utf8_decode($row2['horas']),1,1,'C');
   }
   $y5=$pdf->GetY();

if ($y4>=$y5) {
  $pdf->SetY($y4);
}else {
  $pdf->SetY($y5);
}
}

$consulta3=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 3' and M.Periodo='$periodoF'");
  $consulta4=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 4' and M.Periodo='$periodoF'");

$numR3=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 3' and M.Periodo='$periodoF'"));
$numR4=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 4' and M.Periodo='$periodoF'"));
  if($numR3>=1 or $numR4>=1){
$pdf->SetFont('arial','B',10);
   $pdf->Cell(190,10,utf8_decode('SEGUNDO AÑO'),0,1,'C');
    $y=$pdf->GetY();
    $pdf->SetXY(-190,$y+2);
    $pdf->SetFont('arial','B',8);
    $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
    $pdf->Cell(50,10,'MATERIA',1,0,'C');
    $pdf->Cell(12,10,'HORAS',1,0,'C');
    $pdf->Cell(6,10,'',0,0,'C');
    $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
    $pdf->Cell(50,10,'MATERIA',1,0,'C');
    $pdf->Cell(12,10,'HORAS',1,1,'C');
    $pdf->SetFont('arial','B',7);
    $y2=$pdf->GetY();
    while($row3= mysqli_fetch_array($consulta3)){
      $y=$pdf->GetY();
      $pdf->SetXY(-190,$y);
    $pdf->Cell(22,5,$row3['semestre'],1,0,'L');
    $pdf->Cell(50,5,$row3['Materia'],1,0,'C');
    $pdf->Cell(12,5,utf8_decode($row3['horas']),1,1,'C');
    }
     $y4=$pdf->GetY();
    $pdf->SetXY(110,$y2);
    while($row4= mysqli_fetch_array($consulta4)){
        $y=$pdf->GetY();

      $pdf->SetXY(110,$y);
    $pdf->Cell(22,5,$row4['semestre'],1,0,'L');
    $pdf->Cell(50,5,$row4['Materia'],1,0,'C');
    $pdf->Cell(12,5,utf8_decode($row4['horas']),1,1,'C');
    }
   $y5=$pdf->GetY();
     if ($y4>=$y5) {
       $pdf->SetY($y4);
     }else {
       $pdf->SetY($y5);
     }
}
$consulta5=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 5' and M.Periodo='$periodoF'");
  $consulta6=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 6' and M.Periodo='$periodoF'");

$numR5=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 5' and M.Periodo='$periodoF'"));
$numR6=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 6' and M.Periodo='$periodoF'"));
  if($numR5>=1 or $numR6>=1){
  $pdf->SetFont('arial','B',10);
    $pdf->Cell(190,10,utf8_decode('TERCER AÑO'),0,1,'C');
     $y=$pdf->GetY();
     $pdf->SetXY(-190,$y+2);
     $pdf->SetFont('arial','B',8);
     $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
     $pdf->Cell(50,10,'MATERIA',1,0,'C');
     $pdf->Cell(12,10,'HORAS',1,0,'C');
     $pdf->Cell(6,10,'',0,0,'C');
     $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
     $pdf->Cell(50,10,'MATERIA',1,0,'C');
     $pdf->Cell(12,10,'HORAS',1,1,'C');
     $pdf->SetFont('arial','B',7);
     $y2=$pdf->GetY();
     while($row5= mysqli_fetch_array($consulta5)){
       $y=$pdf->GetY();
       $pdf->SetXY(-190,$y);
     $pdf->Cell(22,5,$row5['semestre'],1,0,'L');
     $pdf->Cell(50,5,$row5['Materia'],1,0,'C');
     $pdf->Cell(12,5,utf8_decode($row5['horas']),1,1,'C');
     }
     $y4=$pdf->GetY();
     $pdf->SetXY(110,$y2);
     while($row6= mysqli_fetch_array($consulta6)){
         $y=$pdf->GetY();

       $pdf->SetXY(110,$y);
     $pdf->Cell(22,5,$row6['semestre'],1,0,'L');
     $pdf->Cell(50,5,$row6['Materia'],1,0,'C');
     $pdf->Cell(12,5,utf8_decode($row6['horas']),1,1,'C');
     }
     $y5=$pdf->GetY();

  if ($y4>=$y5) {
    $pdf->SetY($y4);
  }else {
    $pdf->SetY($y5);
  }
}

$consulta7=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 7' and M.Periodo='$periodoF'");
  $consulta8=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 8' and M.Periodo='$periodoF'");

$numR7=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 7' and M.Periodo='$periodoF'"));
$numR8=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 8' and M.Periodo='$periodoF'"));
  if($numR7>=1 or $numR8>=1){
$pdf->SetFont('arial','B',10);
  $pdf->Cell(190,10,utf8_decode('CUARTO AÑO'),0,1,'C');
   $y=$pdf->GetY();
   $pdf->SetXY(-190,$y+2);
   $pdf->SetFont('arial','B',8);
   $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
   $pdf->Cell(50,10,'MATERIA',1,0,'C');
   $pdf->Cell(12,10,'HORAS',1,0,'C');
   $pdf->Cell(6,10,'',0,0,'C');
   $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
   $pdf->Cell(50,10,'MATERIA',1,0,'C');
   $pdf->Cell(12,10,'HORAS',1,1,'C');
   $pdf->SetFont('arial','B',7);
   $y2=$pdf->GetY();
   while($row7= mysqli_fetch_array($consulta7)){
     $y=$pdf->GetY();
     $pdf->SetXY(-190,$y);
   $pdf->Cell(22,5,$row7['semestre'],1,0,'L');
   $pdf->Cell(50,5,$row7['Materia'],1,0,'C');
   $pdf->Cell(12,5,utf8_decode($row7['horas']),1,1,'C');
   }
   $y4=$pdf->GetY();
   $pdf->SetXY(110,$y2);
   while($row8= mysqli_fetch_array($consulta8)){
       $y=$pdf->GetY();

     $pdf->SetXY(110,$y);
   $pdf->Cell(22,5,$row8['semestre'],1,0,'L');
   $pdf->Cell(50,5,$row8['Materia'],1,0,'C');
   $pdf->Cell(12,5,utf8_decode($row8['horas']),1,1,'C');
   }
   $y5=$pdf->GetY();

if ($y4>=$y5) {
  $pdf->SetY($y4);
}else {
  $pdf->SetY($y5);
}
}


$consulta9=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE' and M.Periodo='$periodoF'");
  $consulta10=mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 10' and M.Periodo='$periodoF'");

$numR9=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 9' and M.Periodo='$periodoF'"));
$numR10=mysqli_num_rows(mysqli_query($con,"SELECT * from mallas M INNER JOIN Carreras C on M.id_carrera=C.id_carrera INNER JOIN usuarios U on C.id_carrera=U.id_carrera where M.semestre like '%".$otra."%' and M.semestre='SEMESTRE 10' and M.Periodo='$periodoF'"));
  if($numR9>=1 or $numR10>=1){
$pdf->SetFont('arial','B',10);
$pdf->Cell(190,10,utf8_decode('QUINTO AÑO'),0,1,'C');
 $y=$pdf->GetY();
 $pdf->SetXY(-190,$y+2);
 $pdf->SetFont('arial','B',8);
 $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
 $pdf->Cell(50,10,'MATERIA',1,0,'C');
 $pdf->Cell(12,10,'HORAS',1,0,'C');
 $pdf->Cell(6,10,'',0,0,'C');
 $pdf->Cell(22,10,'SEMESTRE',1,0,'C');
 $pdf->Cell(50,10,'MATERIA',1,0,'C');
 $pdf->Cell(12,10,'HORAS',1,1,'C');
 $pdf->SetFont('arial','B',7);
 $y2=$pdf->GetY();
 while($row9= mysqli_fetch_array($consulta9)){
   $y=$pdf->GetY();
   $pdf->SetXY(-190,$y);
 $pdf->Cell(22,5,$row9['semestre'],1,0,'L');
 $pdf->Cell(50,5,$row9['Materia'],1,0,'C');
 $pdf->Cell(12,5,utf8_decode($row9['horas']),1,1,'C');
 }
 $y4=$pdf->GetY();
 $pdf->SetXY(110,$y2);
 while($row10= mysqli_fetch_array($consulta10)){
     $y=$pdf->GetY();

   $pdf->SetXY(110,$y);
 $pdf->Cell(22,5,$row10['semestre'],1,0,'L');
 $pdf->Cell(50,5,$row10['Materia'],1,0,'C');
 $pdf->Cell(12,5,utf8_decode($row10['horas']),1,1,'C');
 }
 $y5=$pdf->GetY();

if ($y4>=$y5) {
$pdf->SetY($y4);
}else {
$pdf->SetY($y5);
}
}

$pdf->Cell(20,15,'',0,1,'C');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
