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
    Telf. : 2439394 - 439995 ext. 141
     '),0,'L',0);

     $consulta=mysqli_query($con,"SELECT * from solicitantes S INNER JOIN homologaciones H on S.id_solicitante=H.id_solicitante INNER JOIN anohomolo A on H.id_homologacion=A.id_homologacion INNER JOIN resolucionesh RH on RH.id_homologacion=H.id_homologacion INNER JOIN usuarios U on U.id_usuario=RH.id_usuario where RH.id_resolucionh='$idv'");
      $row= mysqli_fetch_assoc($consulta);
       $NofiRH=$row['numeroRH'];
       $NofiRV=$row['numeroRV'];
     $y=$this->GetY();
     $this->SetXY(130,$y);
     $this->MultiCell(55,5,' Oficio #:'.$NofiRH.'',0,'L',0);
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('arial','I',8);
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
