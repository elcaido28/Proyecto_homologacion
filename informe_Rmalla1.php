<?php
include('TD_reportes.php');
include('conexion.php');
  $idv=$_REQUEST['id'];

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(-195,20);
$pdf->Cell(55,10,'Guayaquil, '.date('d-M-Y').'',0,1,'C');
$y=$pdf->GetY();
$pdf->SetXY(-190,$y+=+2);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(175,5,utf8_decode('
Ingeniero
Néstor Vera Lucio, DECANO
Facultad de Ciencias Agrarias
Universidad Agraria del Ecuador
Presente.-
 '),0,'L',0);

 $pdf->SetXY(-190,$y+=+30);
 $pdf->SetFont('arial','B',12);

 $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN homologaciones H on S.id_solicitante=H.id_solicitante INNER JOIN anohomolo A on H.id_homologacion=A.id_homologacion INNER JOIN usuarios U on U.id_usuario=H.id_usuario where H.id_homologacion='$idv'");
  $row= mysqli_fetch_assoc($consulta);
$nombres=$row['Nombre']." ".$row['Apellido'];
$carreraa=$row['CarreraA'];
$carrerap=$row['carreraP'];
$unip=$row['universiP'];
$ano=$row['anohomo'];
$profesor=$row['nombreU']." ".$row['apellidoU'];
$xqno=$row['observacion'];
$pdf->MultiCell(175,5,utf8_decode('
De mis consideraciones:

En atención  a la solicitud de revisión de malla, presentada por la/el Sr/Srta. '.$nombres.', proveniente de la '.$unip.', de la Carrera '.$carrerap.', me permito considerar a usted y por su digno intermedio a los Miembros del H.Consejo Directivo, que luego de efectuada revisión y análisis de la documentación presentada, proceden las siguientes consideraciones:
'),0,'J',0);


$y=$pdf->GetY();
$pdf->SetXY(-180,$y);
$pdf->Cell(165,10,'
'.$xqno.'
',0,1,'J');

$y=$pdf->GetY();
$pdf->SetXY(-190,$y);
 $pdf->SetFont('arial','B',12);
$pdf->MultiCell(175,5,utf8_decode('
En base a lo expuesto, por la/el Sr/Srta. '.$nombres.', no procede con la revisión de malla y homologación de materias por falta de documentación, particular que pongo en consideración del H. Consejo Directivo para su análisis y resolución.

Atentamente,
'),0,'J',0);

$y=$pdf->GetY();
$pdf->SetXY(-190,$y);
$pdf->MultiCell(175,5,utf8_decode('





Ing '.$profesor.', Msc.
PROFESOR  DELEGADO

'),0,'J',0);





/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
