<?php


require 'FPDF/fpdf.php';

class PDF extends FPDF
{
  function Header()
  {
    include('conexion.php');
    $idv=$_REQUEST['id'];
    $this->SetFont('arial','B',12);
     $this->image('imagenes/logo2.jpg',20,6,30);

     $this->SetXY(-195,28);
    $this->MultiCell(175,5,utf8_decode('
    Universidad Agraria del ecuador
    Facultad de ciencias agrarias
    CONSEJO DIRECTIVO
    Av. 25 de julio - Guayaquil
    Casilla No. Postal No. 09-01-1248
    Telf. : 2439394 - 439995 ext. 141 '),0,'L',0);

     $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN validaciones V on S.id_solicitante=V.id_solicitante  INNER JOIN resolucionesv RV on RV.id_validacion=V.id_validacion INNER JOIN usuarios U on U.id_usuario=RV.id_usuario INNER JOIN carreras C on U.id_carrera=C.id_carrera where RV.id_resolucionv='$idv'");
      $row= mysqli_fetch_assoc($consulta);
       $NofiRV=$row['numeroRV'];
     $y=$this->GetY();
     $this->SetXY(130,$y);
     $this->MultiCell(55,5,' Oficio #:'.$NofiRV.'',0,'L',0);
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('arial','I',8);
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
