<?php
include('TD_reportes_Horizontal.php');
include('conexion.php');
if (isset($_POST['otraB'])) {
$otra=$_POST['otraB'];
$consulta=mysqli_query($con,"SELECT * from proyectos P INNER JOIN clientes C on P.id_cliente=C.id_cliente INNER JOIN empleados E on P.id_empleado= E.id_empleado INNER JOIN objetos_d_proy OP on P.id_proyecto=OP.id_proyecto INNER JOIN objetos_publicitarios O on O.id_objetos_publicitarios=OP.id_objeto_publicitario
 where P.estado_proy like '%".$otra."%' or P.nombre_proy like '%".$otra."%' or P.id_proyecto like '%".$otra."%' or C.nombreEmp_cli like '%".$otra."%' or C.nombreEmp_cli like '%".$otra."%' ORDER BY nombre_proy ASC");
}else {
if(empty($_POST['Xfechaini']) and empty($_POST['Xfechafin'])){
      $desde="";
      $hasta="";
      $consulta=mysqli_query($con,"SELECT * from proyectos P INNER JOIN clientes C on P.id_cliente=C.id_cliente INNER JOIN empleados E on P.id_empleado=E.id_empleado INNER JOIN objetos_d_proy OP on P.id_proyecto=OP.id_proyecto INNER JOIN objetos_publicitarios O on O.id_objetos_publicitarios=OP.id_objeto_publicitario
      where P.fechap like '%".$desde."%' ORDER BY nombre_proy ASC");
 }else {
   $hasta=$_POST['Xfechaini'];
   $desde=$_POST['Xfechafin'];
   $consulta=mysqli_query($con,"SELECT * from proyectos P INNER JOIN clientes C on P.id_cliente=C.id_cliente INNER JOIN empleados E on P.id_empleado=E.id_empleado INNER JOIN objetos_d_proy OP on P.id_proyecto=OP.id_proyecto INNER JOIN objetos_publicitarios O on O.id_objetos_publicitarios=OP.id_objeto_publicitario
  where P.fechap BETWEEN '$desde' and '$hasta' ORDER BY nombre_proy ASC");
}
}
$pdf=new PDF('L','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(120,17);
$pdf->Cell(170,10,'REPORTE DE PROYECTOS',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetY($y+2);
$pdf->SetFont('arial','B',8);
$pdf->Cell(22,10,'Fecha',1,0,'C');
$pdf->Cell(25,10,'RUC/C.I.',1,0,'C');
$pdf->Cell(30,10,'Nombre/Emp.Cli.',1,0,'C');
$pdf->Cell(35,10,'Nombre/Cliente',1,0,'C');
$pdf->Cell(20,10,'Celular',1,0,'C');
$pdf->Cell(27,10,'Nombre/empleado',1,0,'C');
$pdf->Cell(30,10,'Nombre/Proy.',1,0,'C');
$pdf->Cell(35,10,'Objeto/Proy.',1,0,'C');
$pdf->Cell(25,10,'Estado/Proy.',1,0,'C');
$pdf->Cell(25,10,'Fecha/Fin',1,1,'C');

$pdf->SetFont('arial','B',8);
while($row5=mysqli_fetch_array($consulta)){
$pdf->Cell(22,10,$row5['fechap'],1,0,'C');
$pdf->Cell(25,10,$row5['ruc_ci'],1,0,'C');
$pdf->Cell(30,10,utf8_decode($row5['nombreEmp_cli']),1,0,'C');
$pdf->Cell(35,10,utf8_decode($row5['nombre_cli']),1,0,'C');
$pdf->Cell(20,10,$row5['celular_cli'],1,0,'C');
$pdf->Cell(27,10,utf8_decode($row5['nombre_emp']),1,0,'C');
$pdf->Cell(30,10,utf8_decode($row5['nombre_proy']),1,0,'C');
$pdf->Cell(35,10,utf8_decode($row5['NombreO']),1,0,'C');
$pdf->Cell(25,10,utf8_decode($row5['estado_proy']),1,0,'C');
$pdf->Cell(25,10,$row5['fechaFin_proy'],1,1,'C');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
