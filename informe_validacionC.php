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

 $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN validaciones V on S.id_solicitante=V.id_solicitante INNER JOIN usuarios U on U.id_usuario=V.id_usuario where V.id_validacion='$idv'");
  $row= mysqli_fetch_assoc($consulta);
$nombres=$row['Nombre']." ".$row['Apellido'];
$carreraa=$row['CarreraA'];
$carrerap=$row['carreraP'];
$unip=$row['universiP'];
$profesor=$row['nombreU']." ".$row['apellidoU'];
$ult_ano=$row['ult_ano'];
$pdf->MultiCell(175,5,utf8_decode('
De mis consideraciones:

En atención  a la solicitud de revisión de malla, presentada por la/el Sr/Srta. '.$nombres.', estudiante de la Carrera '.$carrerap.', me remito a manifestar a usted y por su digno intermedio a los miembros del H Consejo Directivo, que luego de la efectuada revisión y análisis de la documentación presentada, proceden las siguientes consideraciones:
'),0,'J',0);


$y=$pdf->GetY();
$pdf->SetXY(-180,$y);
$pdf->MultiCell(165,5,utf8_decode('
El último periodo de estudio del estudiante es el  (último periodo de estudio), cursó hasta el (periodos) quinto año de la carrera Ingeniería en Computación e Informatica, no habiendo realizado la titulación intermedia del cuarto nivel y según la disposición QUINTA del régimen académico "Si un estudiante no finaliza su carrera o programa y se retira, podrá reingresar a la misma carrera o programa en el tiempo máximo de 5 años contados a partir de la fecha de su retiro. Si tuviere aplicándose el mismo plan de estudios  deberá completar todos los requisitos establecidos en el plan de estudios vigente a la fecha de su reingreso. Cumplido este plazo máximo para el referido reingreso deberá reiniciar sus estudios en una carrera o programa vigente. En este caso el estudiante podrá homologar a través del mecanismo de validación de conocimientos, las asignaturas, cursos o sus equivalentes en una carrera o programa vigente, de conformidad como lo establecido en el presente".
'),0,'J',0);

$fechaactual = date('Y-m-d'); // 2016-12-29
$nuevafecha = strtotime ('+1 year' , strtotime($fechaactual)); //Se añade un año mas
$nuevafecha = date ('Y',$nuevafecha);
$y=$pdf->GetY();
$pdf->SetXY(-190,$y);
 $pdf->SetFont('arial','B',12);
$pdf->MultiCell(175,5,utf8_decode('
En base a lo expuesto, por la/el Sr/Srta. '.$nombres.', se le sugiere rendir el EXAMEN DE VALIDACIÓN DE CONOCIMEINTOS: '.$ult_ano.' COMPONENTES BÁSICOS Y COMPONENTES ESPECIFICOS, para la carrera de nombre de la carrera, campus Milagro/Guayaquil, período lectivo '.date('Y').'-'.$nuevafecha.', particular que pongo en consideración del H. Consejo Directivo para su análisis y resolución.

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
