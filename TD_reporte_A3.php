<?php
require 'FPDF/fpdf.php';
class PDF extends FPDF
{

  function Header()
  {
   $this->image('icono_uae.png',20,6,30);
   $this->SetFont('arial','B',10);
   $this->SetXY(235,6);
   $this->Cell(230,10,'Fecha: Guayaquil, '.date('d-m-y').'',0,1,'C');
   $this->SetFont('arial','B',14);
   $this->SetXY(125,10);
   $this->Cell(170,10,'SOLEMP',0,1,'C');
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('arial','I',8);
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
