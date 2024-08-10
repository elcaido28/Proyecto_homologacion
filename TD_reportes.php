<?php
include('conexion.php');

require 'FPDF/fpdf.php';

class PDF extends FPDF
{
  function Header()
  {
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('arial','I',8);
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
