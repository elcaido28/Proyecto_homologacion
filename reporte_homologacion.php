<?php
include('TD_reportes_Horizontal.php');
include('conexion.php');

if (isset($_POST['otraB'])) {
$otra=$_POST['otraB'];
$usup=$_POST['NombreEmpleado'];
   $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN homologaciones H on S.id_solicitante=H.id_solicitante INNER JOIN usuarios U on H.id_usuario=U.id_usuario
where H.numero_ofi like '%".$otra."%' and H.id_usuario='$usup' or S.NumeroS like '%".$otra."%' and H.id_usuario='$usup' or S.Cedula like '%".$otra."%' and H.id_usuario='$usup' or S.Apellido like '%".$otra."%' and H.id_usuario='$usup' or S.CarreraA like '%".$otra."%' and H.id_usuario='$usup' ORDER BY S.Apellido ASC ");
}else {
if(empty($_POST['Xfechaini']) and empty($_POST['Xfechafin'])){
      $desde="";
      $hasta="";
      $usup=$_POST['NombreEmpleado'];
      $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN homologaciones H on S.id_solicitante=H.id_solicitante INNER JOIN usuarios U on H.id_usuario=U.id_usuario
      where H.fechaH like '%".$desde."%' and H.id_usuario='$usup' ORDER BY S.Apellido ASC");
 }else {
   $hasta=$_POST['Xfechaini'];
   $desde=$_POST['Xfechafin'];
   $usup=$_POST['NombreEmpleado'];
     $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN homologaciones H on S.id_solicitante=H.id_solicitante INNER JOIN usuarios U on H.id_usuario=U.id_usuario
  where H.fechaH BETWEEN '$desde' and '$hasta' and H.id_usuario='$usup' ORDER BY S.Apellido ASC");
}
}

$pdf=new PDF('L','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(60,35);
$pdf->Cell(170,10,'REPORTE DE HOMOLOGACIONES',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetY($y+2);
$pdf->SetFont('arial','B',8);
$pdf->Cell(20,10,utf8_decode('Nº solicitud'),1,0,'C');
$pdf->Cell(70,10,'Nombres / Solicitante',1,0,'C');
$pdf->Cell(20,10,'Fecha',1,0,'C');
$pdf->Cell(20,10,utf8_decode('Nº oficio'),1,0,'C');
$pdf->Cell(120,10,'Observacion',1,0,'C');
$pdf->Cell(20,10,'estado',1,1,'C');

$pdf->SetFont('arial','B',8);
while($row5=mysqli_fetch_array($consulta)){
$pdf->Cell(20,10,$row5['NumeroS'],'T',0,'C');
$pdf->Cell(70,10,utf8_decode($row5['Nombre'].' '.$row5['Apellido']),'T',0,'C');
$pdf->Cell(20,10,utf8_decode($row5['fechaH']),'T',0,'C');
$pdf->Cell(20,10,utf8_decode($row5['numero_ofi']),'T',0,'C');
$y=$pdf->GetY();
$pdf->SetXY(140,$y);
$pdf->MultiCell(120,5,$row5['observacion'],'T','L',0);
$pdf->SetXY(260,$y);
$pdf->Cell(20,10,utf8_decode($row5['estado1']),'T',1,'C');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
