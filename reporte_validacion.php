<?php
include('TD_reporte_vertical.php');
include('conexion.php');

if (isset($_POST['otraB'])) {
$otra=$_POST['otraB'];
$usup=$_POST['NombreEmpleado'];
   $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN validaciones V on S.id_solicitante=V.id_solicitante INNER JOIN usuarios U on V.id_usuario=U.id_usuario
where V.numeroV like '%".$otra."%' and V.id_usuario='$usup' or S.NumeroS like '%".$otra."%' and V.id_usuario='$usup' or S.Cedula like '%".$otra."%' and V.id_usuario='$usup' or S.Apellido like '%".$otra."%' and V.id_usuario='$usup' or S.CarreraA like '%".$otra."%' and V.id_usuario='$usup' ORDER BY V.numeroV ASC ");
}else {
if(empty($_POST['Xfechaini']) and empty($_POST['Xfechafin'])){
      $desde="";
      $hasta="";
      $usup=$_POST['NombreEmpleado'];
      $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN validaciones V on S.id_solicitante=V.id_solicitante INNER JOIN usuarios U on V.id_usuario=U.id_usuario
      where V.fechaV like '%".$desde."%' and V.id_usuario='$usup' ORDER BY V.numeroV ASC");
 }else {
   $hasta=$_POST['Xfechaini'];
   $desde=$_POST['Xfechafin'];
   $usup=$_POST['NombreEmpleado'];
     $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN validaciones V on S.id_solicitante=V.id_solicitante INNER JOIN usuarios U on V.id_usuario=U.id_usuario
  where V.fechaV BETWEEN '$desde' and '$hasta' and V.id_usuario='$usup' ORDER BY V.numeroV ASC");
}
}

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(55,35);
$pdf->Cell(100,10,'REPORTE DE VALIDACIONES',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetXY(30,$y+2);
$pdf->SetFont('arial','B',8);
$pdf->Cell(20,10,utf8_decode('Nº solicitud'),1,0,'C');
$pdf->Cell(70,10,'Nombres / Solicitante',1,0,'C');
$pdf->Cell(20,10,'Fecha',1,0,'C');
$pdf->Cell(20,10,utf8_decode('Nº oficio'),1,0,'C');
$pdf->Cell(20,10,'estado',1,1,'C');

$pdf->SetFont('arial','B',8);
while($row5=mysqli_fetch_array($consulta)){
  $y=$pdf->GetY();
  $pdf->SetXY(30,$y);
$pdf->Cell(20,10,$row5['NumeroS'],'T',0,'C');
$pdf->Cell(70,10,utf8_decode($row5['Nombre'].' '.$row5['Apellido']),'T',0,'C');
$pdf->Cell(20,10,utf8_decode($row5['fechaV']),'T',0,'C');
$pdf->Cell(20,10,utf8_decode($row5['numeroV']),'T',0,'C');
$pdf->Cell(20,10,utf8_decode($row5['estadoV']),'T',1,'C');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
