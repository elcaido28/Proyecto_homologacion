<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Progreso de Tramites</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo_progreso.css">
  </head>
  <body>
    <nav class="nav1">
      <header class="header2">
      <div class="wrapper">
      	<div class="logo"> <a href="#"><img src="../icono_uae.png" href="#.php" class="logo_uae"></a>  </div>
        <div class="menu-logo">
          <a href="#"><i class="fa fa-user" aria-hidden="true"></i><?php echo " ".$_SESSION['ES_USU']; ?></a>
        </div>
      </div>
      </header>
    </nav>
    <section>
      <div class="conten_progreso">
        <div class="titulo2">

          <p>Progreso del Tramite</p>

        </div>
        <div class="progreso" id="progreso">
          <?php
          session_start();
          include('../conexion.php');
          $cedula=$_SESSION['CEDU'];
          $result= mysqli_query($con,"SELECT * from solicitantes where Cedula='$cedula'");
          $row= mysqli_fetch_assoc($result);
          $ano_actual=date(Y);
          $ano=$ano_actual-$row['ult_ano'];
          if($ano<=5){
            $result2= mysqli_query($con,"SELECT * from solicitantes S inner join homologaciones H on H.id_solicitante=S.id_solicitante left join resolucionesh RH on RH.id_homologacion=H.id_homologacion where S.Cedula='$cedula'");
            $row2= mysqli_fetch_assoc($result2);

            $salida="<img src='img/progreso_secretaria.png' alt=''>";

            if($row2['estado1']=="EN CURSO"){
              $salida="<img src='img/progreso_ProfesorD.png' alt=''>";
            }elseif($row2['estado1']=="FINALIZADA" and $row2['estado2']=="FINALIZADA" and $row2['estadoRH']!="FINALIZADA"){
            $salida="<img src='img/progreso_consejo.png' alt=''>";
          }elseif($row2['estadoRH']=="FINALIZADA"){
            $salida="<img src='img/progreso_fin.png' alt=''>";
          }else{
            $salida="<img src='img/progreso_secretaria.png' alt=''>";
          }
          }else{
            $result3= mysqli_query($con,"SELECT * from solicitantes S inner join homologaciones H on H.id_solicitante=S.id_solicitante left join resolucionesh RH on RH.id_homologacion=H.id_homologacion where S.Cedula='$cedula'");
            $row3= mysqli_fetch_assoc($result3);

            $salida="<img src='img/progreso_secretaria.png' alt=''>";

            if($row3['estado1']=="EN CURSO"){
              $salida="<img src='img/progreso_ProfesorD.png' alt=''>";
            }elseif($row3['estado1']=="FINALIZADA" and $row3['estado2']=="FINALIZADA"){
            $salida="<img src='img/progreso_consejo.png' alt=''>";
          }elseif($row3['estadoRH']=="FINALIZADA"){
            $salida="<img src='img/progreso_fin.png' alt=''>";
          }else{
            $salida="<img src='img/progreso_secretaria.png' alt=''>";
          }
          }
          echo $salida;
           ?>

        </div>

      </div>
      <center>
      <a href="index.php" class="salir"><i class="fas fa-sign-out-alt"></i> SALIR</a>
    </center>
    </section>
    <script src="../jquery.js" charset="utf-8"></script>
    <script src="ver_progreso.js" charset="utf-8"></script>
  </body>
</html>
