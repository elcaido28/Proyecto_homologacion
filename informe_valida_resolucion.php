<?php

include('conexion.php');
  $idv=$_REQUEST['id'];
include('TD_reportes3.php');
$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);

 $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN validaciones V on S.id_solicitante=V.id_solicitante  INNER JOIN resolucionesv RV on RV.id_validacion=V.id_validacion INNER JOIN usuarios U on U.id_usuario=RV.id_usuario INNER JOIN carreras C on U.id_carrera=C.id_carrera where RV.id_resolucionv='$idv'");
  $row= mysqli_fetch_assoc($consulta);
  $NofiRV=$row['numeroRV'];

 $y=$pdf->GetY();
 $pdf->SetXY(130,$y);
 $pdf->MultiCell(55,5,'Guayaquil, '.date('d-M-Y').' ',0,'L',0);
 $y=$pdf->GetY();
 $pdf->SetXY(-190,$y);
 $pdf->SetFont('arial','B',12);

$nombres=$row['Nombre']." ".$row['Apellido'];
$fechaCons=$row['fechaCons'];
$NofiH=$row['numeroV'];
$fechaH=$row['fechaV'];
$fechaS=$row['fechaS'];
$carreraa=$row['CarreraA'];
$carrerap=$row['carreraP'];
$unip=$row['universiP'];
$ult_ano=$row['ult_ano'];
$profesor=$row['nombreU']." ".$row['apellidoU'];
$carreraProf=$row['nombreC'];

 $y=$pdf->GetY();
 $pdf->SetXY(-190,$y);
 $pdf->MultiCell(175,5,utf8_decode('Señores
Miembros del H.  Consejo Directivo
Srta/SR. '.$nombres.', Estudiante
FACULTAD DE CIENCIAS AGRARIAS.-
Ciudad.'),0,'L',0);

  $y=$pdf->GetY();
  $pdf->SetXY(-190,$y);
   $pdf->SetFont('arial','B',11);
$pdf->MultiCell(175,5,utf8_decode('
De mis consideraciones:
El H. Consejo Directivo de la Facultad de Ciencias Agrarias de la Universidad Agraria del Ecuador, en sesión ordinaria celebrada el '.$fechaCons.', en atención al Oficio '.$NofiH.' con fecha de '.$fechaH.', presentado por la Ing. '.$profesor.', profesor delegado de la carrera de '.$carreraProf.', quien informa referente a la comunicación de '.$fechaS.', presentado por la Srta. '.$nombres.', estudiante de '.$carrerap.' de la '.$unip.', el último periodo lectivo lo realizo el '.$ult_ano.', no realizó la Titulación Intermedia del I Nivel y conforme a la revisión y análisis de la documentación presentada, proceden las siguientes consideraciones.
El último periodo de estudio del estudiante es en el '.$ult_ano.', cursó hasta el III año en la carrera de  Tecnología  en Computación e Informática, y según la Disposición General Quinta Del Actual Reglamento De Régimen Académico en donde indica que "Si un estudiante no finaliza su carrera o programa y se retira, podrá reingresar a la misma carrera o programe en el tiempo máximo de 5 años contados a partir de la fecha de su retiro. Si tuviere aplicándose el mismo plan de estudios  deberá completar todos los requisitos establecidos en el plan de estudios vigente a la fecha de su reingreso.
En este caso el estudiante podrá homologar a través del mecanismo de validación de conocimientos, las asignaturas, cursos o sus equivalentes en una carrera o programa vigente". Por lo tanto la Srta. '.$nombres.', podrá homologar las asignaturas correspondientes, en la  '.$carreraa.', por el procedimiento de VALIDACIÓN DE CONOCIMIENTOS al indicado al Art. 64 del actual régimen académico, al respecto se resolvió: aprobar el oficio '.$NofiH.' presentado por la Sra./sr. '.$profesor.', en la  carrera de '.$carreraProf.' de esta facultad, la Srta. '.$nombres.' debe homologar las asignaturas aprobadas por el procedimiento de validación de conocimientos, de acuerdo al Art. 64 de actual Régimen Académico aprobado por CES.
Particular que comunico para los fines consiguientes.

Atentamente,'),0,'J',0);


 $pdf->SetFont('arial','B',12);
$y=$pdf->GetY();
$pdf->SetXY(-190,$y);
$pdf->MultiCell(175,5,utf8_decode('
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
