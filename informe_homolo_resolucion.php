<?php

include('conexion.php');
  $idv=$_REQUEST['id'];
include('TD_reportes2.php');
$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);


 $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN homologaciones H on S.id_solicitante=H.id_solicitante INNER JOIN anohomolo A on H.id_homologacion=A.id_homologacion INNER JOIN resolucionesh RH on RH.id_homologacion=H.id_homologacion INNER JOIN usuarios U on U.id_usuario=RH.id_usuario where RH.id_resolucionh='$idv'");
  $row= mysqli_fetch_assoc($consulta);
   $NofiRH=$row['numeroRH'];
 $y=$pdf->GetY();
 $pdf->SetXY(130,$y);
 $pdf->MultiCell(55,5,'Guayaquil, '.date('d-M-Y').' ',0,'L',0);
 $y=$pdf->GetY();
 $pdf->SetXY(-190,$y);
 $pdf->SetFont('arial','B',12);

$nombres=$row['Nombre']." ".$row['Apellido'];
$fechaCons=$row['fechaCons'];
$NofiH=$row['numero_ofi'];
$fechaH=$row['fechaH'];
$fechaS=$row['fechaS'];
$carreraa=$row['CarreraA'];
$carrerap=$row['carreraP'];
$unip=$row['universiP'];
$anohomo=$row['anohomo'];
$profesor=$row['nombreU']." ".$row['apellidoU'];
$idH=$row['id_homologacion'];

 $y=$pdf->GetY();
 $pdf->SetXY(-190,$y);
 $pdf->MultiCell(175,5,utf8_decode('
Señores
Miembros del H.  Consejo Directivo
Srta/SR. '.$nombres.', Estudiante
FACULTAD DE CIENCIAS AGRARIAS.-
Ciudad.
  '),0,'L',0);

  $y=$pdf->GetY();
  $pdf->SetXY(-190,$y);
$pdf->MultiCell(175,5,utf8_decode('
De mis consideraciones:
El H. Consejo Directivo de la Facultad de Ciencias Agrarias de la Universidad Agraria del Ecuador, en sesión ordinaria celebrada el '.$fechaCons.', en atención al Oficio '.$NofiH.' DEL '.$fechaH.', suscrita por la/el '.$profesor.', Profesor Delegado de esta Facultad, referente a la comunicación de '.$fechaS.', presentado por la Srta/Sr. '.$nombres.', estudiante de '.$carrerap.' de la '.$unip.', en el cual se solicita, se le conceda matrícula para la carrera de '.$carreraa.', de esta facultad y homologación de asignaturas aprobadas en el programa antes indicado, debido al cambio del pensum académico de esta facultad, al respecto

SE RESOLVIO:
'),0,'J',0);

$fechaactual = date('Y-m-d'); // 2016-12-29
$nuevafecha = strtotime ('+1 year' , strtotime($fechaactual)); //Se añade un año mas
$nuevafecha = date ('Y',$nuevafecha);
$y=$pdf->GetY();
$pdf->SetXY(-190,$y);
 $pdf->SetFont('arial','B',12);
$pdf->MultiCell(175,5,utf8_decode('
Acoger el informe del Profesor Delegado de esta Facultad y concederle MATRICULA POR PRIMERA VEZ A '.$anohomo.', periodo lectivo '.date('Y').'-'.$nuevafecha.', en la carrera de '.$carreraa.' de la facultad de Ciencias Agrarias, unidad académica Guayaquil, dándole por aprobadas las asignaturas que se detallan a continuación.
'),0,'J',0);



$consulta1=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 1'");
  $consulta2=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 2'");

$numR1=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 1'"));
$numR2=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 2'"));
if($numR1>=1 or $numR2>=1){

$pdf->SetFont('arial','B',10);
$pdf->Cell(190,10,utf8_decode('PRIMER AÑO'),0,1,'C');
 $y=$pdf->GetY();
 $pdf->SetXY(-190,$y+2);
 $pdf->SetFont('arial','B',8);
 $pdf->Cell(50,10,'PRIMER SEMESTRE',1,0,'C');
 $pdf->Cell(12,10,'HORAS',1,0,'C');
 $pdf->Cell(22,10,'CALIFICACION',1,0,'C');
 $pdf->Cell(6,10,'',0,0,'C');
 $pdf->Cell(50,10,'SEGUNDO SEMESTRE',1,0,'C');
 $pdf->Cell(12,10,'HORAS',1,0,'C');
 $pdf->Cell(22,10,'CALIFICACION',1,1,'C');
 $pdf->SetFont('arial','B',7);
 $y2=$pdf->GetY();
 while($row1= mysqli_fetch_array($consulta1)){
   $y=$pdf->GetY();
   $pdf->SetXY(-190,$y);
 $pdf->Cell(50,5,$row1['Materia'],1,0,'L');
 $pdf->Cell(12,5,$row1['horas'],1,0,'C');
 $pdf->Cell(22,5,utf8_decode($row1['calificacion']),1,1,'C');
 }
 $y4=$pdf->GetY();
 $pdf->SetXY(110,$y2);
 while($row2= mysqli_fetch_array($consulta2)){
     $y=$pdf->GetY();

   $pdf->SetXY(110,$y);
 $pdf->Cell(50,5,$row2['Materia'],1,0,'L');
 $pdf->Cell(12,5,$row2['horas'],1,0,'C');
 $pdf->Cell(22,5,utf8_decode($row2['calificacion']),1,1,'C');
 }
 $y5=$pdf->GetY();

if ($y4>=$y5) {
$pdf->SetY($y4);
}else {
$pdf->SetY($y5);
}
}

 $consulta3=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 3'");
$consulta4=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 4'");


$numR3=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 3'"));
$numR4=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 4'"));
if($numR3>=1 or $numR4>=1){
$pdf->SetFont('arial','B',10);
 $pdf->Cell(190,10,utf8_decode('SEGUNDO AÑO'),0,1,'C');
  $y=$pdf->GetY();
  $pdf->SetXY(-190,$y+2);
  $pdf->SetFont('arial','B',8);
  $pdf->Cell(50,10,'TERCER SEMESTRE',1,0,'C');
  $pdf->Cell(12,10,'HORAS',1,0,'C');
  $pdf->Cell(22,10,'CALIFICACION',1,0,'C');
  $pdf->Cell(6,10,'',0,0,'C');
  $pdf->Cell(50,10,'CUARTO SEMESTRE',1,0,'C');
  $pdf->Cell(12,10,'HORAS',1,0,'C');
  $pdf->Cell(22,10,'CALIFICACION',1,1,'C');
  $pdf->SetFont('arial','B',7);
  $y2=$pdf->GetY();
  while($row3= mysqli_fetch_array($consulta3)){
    $y=$pdf->GetY();
    $pdf->SetXY(-190,$y);
  $pdf->Cell(50,5,$row3['Materia'],1,0,'L');
  $pdf->Cell(12,5,$row3['horas'],1,0,'C');
  $pdf->Cell(22,5,utf8_decode($row3['calificacion']),1,1,'C');
  }
   $y4=$pdf->GetY();
  $pdf->SetXY(110,$y2);
  while($row4= mysqli_fetch_array($consulta4)){
      $y=$pdf->GetY();

    $pdf->SetXY(110,$y);
  $pdf->Cell(50,5,$row4['Materia'],1,0,'L');
  $pdf->Cell(12,5,$row4['horas'],1,0,'C');
  $pdf->Cell(22,5,utf8_decode($row4['calificacion']),1,1,'C');
  }
 $y5=$pdf->GetY();
   if ($y4>=$y5) {
     $pdf->SetY($y4);
   }else {
     $pdf->SetY($y5);
   }
}
  $consulta5=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 5'");
    $consulta6=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 6'");


$numR5=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 5'"));
$numR6=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 6'"));
if($numR5>=1 or $numR6>=1){
$pdf->SetFont('arial','B',10);
  $pdf->Cell(190,10,utf8_decode('TERCER AÑO'),0,1,'C');
   $y=$pdf->GetY();
   $pdf->SetXY(-190,$y+2);
   $pdf->SetFont('arial','B',8);
   $pdf->Cell(50,10,'QUINTO SEMESTRE',1,0,'C');
   $pdf->Cell(12,10,'HORAS',1,0,'C');
   $pdf->Cell(22,10,'CALIFICACION',1,0,'C');
   $pdf->Cell(6,10,'',0,0,'C');
   $pdf->Cell(50,10,'SEXTO SEMESTRE',1,0,'C');
   $pdf->Cell(12,10,'HORAS',1,0,'C');
   $pdf->Cell(22,10,'CALIFICACION',1,1,'C');
   $pdf->SetFont('arial','B',7);
   $y2=$pdf->GetY();
   while($row5= mysqli_fetch_array($consulta5)){
     $y=$pdf->GetY();
     $pdf->SetXY(-190,$y);
   $pdf->Cell(50,5,$row5['Materia'],1,0,'L');
   $pdf->Cell(12,5,$row5['horas'],1,0,'C');
   $pdf->Cell(22,5,utf8_decode($row5['calificacion']),1,1,'C');
   }
   $y4=$pdf->GetY();
   $pdf->SetXY(110,$y2);
   while($row6= mysqli_fetch_array($consulta6)){
       $y=$pdf->GetY();

     $pdf->SetXY(110,$y);
   $pdf->Cell(50,5,$row6['Materia'],1,0,'L');
   $pdf->Cell(12,5,$row6['horas'],1,0,'C');
   $pdf->Cell(22,5,utf8_decode($row6['calificacion']),1,1,'C');
   }
   $y5=$pdf->GetY();

if ($y4>=$y5) {
  $pdf->SetY($y4);
}else {
  $pdf->SetY($y5);
}
}

$consulta7=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 7'");
$consulta8=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 8'");



$numR7=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 7'"));
$numR8=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 8'"));
if($numR7>=1 or $numR8>=1){
$pdf->SetFont('arial','B',10);
$pdf->Cell(190,10,utf8_decode('CUARTO AÑO'),0,1,'C');
 $y=$pdf->GetY();
 $pdf->SetXY(-190,$y+2);
 $pdf->SetFont('arial','B',8);
 $pdf->Cell(50,10,'SEPTIMO SEMESTRE',1,0,'C');
 $pdf->Cell(12,10,'HORAS',1,0,'C');
 $pdf->Cell(22,10,'CALIFICACION',1,0,'C');
 $pdf->Cell(6,10,'',0,0,'C');
 $pdf->Cell(50,10,'OCTAVO SEMESTRE',1,0,'C');
 $pdf->Cell(12,10,'HORAS',1,0,'C');
 $pdf->Cell(22,10,'CALIFICACION',1,1,'C');
 $pdf->SetFont('arial','B',7);
 $y2=$pdf->GetY();
 while($row7= mysqli_fetch_array($consulta7)){
   $y=$pdf->GetY();
   $pdf->SetXY(-190,$y);
 $pdf->Cell(50,5,$row7['Materia'],1,0,'L');
 $pdf->Cell(12,5,$row7['horas'],1,0,'C');
 $pdf->Cell(22,5,utf8_decode($row7['calificacion']),1,1,'C');
 }
 $y4=$pdf->GetY();
 $pdf->SetXY(110,$y2);
 while($row8= mysqli_fetch_array($consulta8)){
     $y=$pdf->GetY();

   $pdf->SetXY(110,$y);
 $pdf->Cell(50,5,$row8['Materia'],1,0,'L');
 $pdf->Cell(12,5,$row8['horas'],1,0,'C');
 $pdf->Cell(22,5,utf8_decode($row8['calificacion']),1,1,'C');
 }
 $y5=$pdf->GetY();

if ($y4>=$y5) {
$pdf->SetY($y4);
}else {
$pdf->SetY($y5);
}
}


$consulta9=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 9'");
$consulta10=mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 10'");



$numR9=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 9'"));
$numR10=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH INNER JOIN homologaciones H on MH.id_homologacion=H.id_homologacion INNER JOIN mallas M on MH.id_malla=M.id_malla where H.id_homologacion='$idH' and M.semestre='SEMESTRE 10'"));
if($numR9>=1 or $numR10>=1){
$pdf->SetFont('arial','B',10);
$pdf->Cell(190,10,utf8_decode('QUINTO AÑO'),0,1,'C');
$y=$pdf->GetY();
$pdf->SetXY(-190,$y+2);
$pdf->SetFont('arial','B',8);
$pdf->Cell(50,10,'NOVENO SEMESTRE',1,0,'C');
$pdf->Cell(12,10,'HORAS',1,0,'C');
$pdf->Cell(22,10,'CALIFICACION',1,0,'C');
$pdf->Cell(6,10,'',0,0,'C');
$pdf->Cell(50,10,'DECIMO SEMESTRE',1,0,'C');
$pdf->Cell(12,10,'HORAS',1,0,'C');
$pdf->Cell(22,10,'CALIFICACION',1,1,'C');
$pdf->SetFont('arial','B',7);
$y2=$pdf->GetY();
while($row9= mysqli_fetch_array($consulta9)){
 $y=$pdf->GetY();
 $pdf->SetXY(-190,$y);
$pdf->Cell(50,5,$row9['Materia'],1,0,'L');
$pdf->Cell(12,5,$row9['horas'],1,0,'C');
$pdf->Cell(22,5,utf8_decode($row9['calificacion']),1,1,'C');
}
$y4=$pdf->GetY();
$pdf->SetXY(110,$y2);
while($row10= mysqli_fetch_array($consulta10)){
   $y=$pdf->GetY();

 $pdf->SetXY(110,$y);
$pdf->Cell(50,5,$row10['Materia'],1,0,'L');
$pdf->Cell(12,5,$row10['horas'],1,0,'C');
$pdf->Cell(22,5,utf8_decode($row10['calificacion']),1,1,'C');
}
$y5=$pdf->GetY();

if ($y4>=$y5) {
$pdf->SetY($y4);
}else {
$pdf->SetY($y5);
}
}

$pdf->SetFont('arial','B',12);
$y=$pdf->GetY();
$pdf->SetXY(-190,$y);
$pdf->MultiCell(175,5,utf8_decode('


Particular que comunico para los fines consiguientes.


Atentamente,


Ing. Néstor Vera Lucio Msc.
Decano

C.C. Secretaría III curso. CCI- Guayaquil'),0,'J',0);





/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
