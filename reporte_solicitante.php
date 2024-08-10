<?php
include('TD_reportes_Horizontal.php');
include('conexion.php');
if (isset($_POST['otraB'])) {
$otra=$_POST['otraB'];
$usup=$_POST['NombreEmpleado'];
$consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN usuarios U on S.id_usuario=U.id_usuario
where S.fechaS like '%".$otra."%' and S.id_usuario='$usup' or S.NumeroS like '%".$otra."%' and S.id_usuario='$usup' or S.Cedula like '%".$otra."%' and S.id_usuario='$usup' or S.Apellido like '%".$otra."%' and S.id_usuario='$usup' or S.CarreraA like '%".$otra."%' and S.id_usuario='$usup' ORDER BY S.Apellido ASC ");
}else {
if(empty($_POST['Xfechaini']) and empty($_POST['Xfechafin'])){
      $desde="";
      $hasta="";
      $usup=$_POST['NombreEmpleado'];
      $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN usuarios U on S.id_usuario=U.id_usuario
      where S.fechaS like '%".$desde."%' and S.id_usuario='$usup' ORDER BY S.Apellido ASC");
 }else {
   $hasta=$_POST['Xfechaini'];
   $desde=$_POST['Xfechafin'];
   $usup=$_POST['NombreEmpleado'];
   $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN usuarios U on S.id_usuario=U.id_usuario
  where S.fechaS BETWEEN '$desde' and '$hasta' and S.id_usuario='$usup' ORDER BY S.Apellido ASC");
}
}

$pdf=new PDF('L','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(60,35);
$pdf->Cell(170,10,'REPORTE DE SOLICITUDES REALIZADAS',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetY($y+2);
$pdf->SetFont('arial','B',8);
$pdf->Cell(20,10,'Fecha','T',0,'C');
$pdf->Cell(20,10,utf8_decode('Nº oficio'),'T',0,'C');
$pdf->Cell(20,10,'Cedula','T',0,'C');
$pdf->Cell(35,10,'Nombre','T',0,'C');
$pdf->Cell(35,10,'Apellido','T',0,'C');
$pdf->Cell(45,10,'Carrera / Aspira','T',0,'C');
$pdf->Cell(45,10,'Carrera / Proviene','T',0,'C');
$pdf->Cell(45,10,'Universidad / Prov.','T',0,'C');
$pdf->Cell(15,10,'Estado','T',1,'L');

$pdf->SetFont('arial','B',8);

while($row5=mysqli_fetch_array($consulta)){
$pdf->Cell(20,10,$row5['fechaS'],'T',0,'C');
$pdf->Cell(20,10,$row5['NumeroS'],'T',0,'C');
$pdf->Cell(20,10,$row5['Cedula'],'T',0,'C');
$pdf->Cell(35,10,utf8_decode($row5['Nombre']),'T',0,'C');
$pdf->Cell(35,10,utf8_decode($row5['Apellido']),'T',0,'C');
$y=$pdf->GetY();
$pdf->SetXY(140,$y);
$pdf->MultiCell(45,3,utf8_decode($row5['CarreraA']),'T','L',0);

$pdf->SetXY(185,$y);
$pdf->MultiCell(45,3,utf8_decode($row5['carreraP']),'T','L',0);

$pdf->SetXY(230,$y);
$pdf->MultiCell(45,3,utf8_decode($row5['universiP']),'T','L',0);
$pdf->SetFont('arial','B',8);

$pdf->SetXY(275,$y);
$pdf->Cell(15,10,$row5['estado'],'T',1,'L');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
