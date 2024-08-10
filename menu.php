  <?php session_start(); ?>
<?php  if(!empty($_SESSION['TD']) || !empty($_SESSION['S']) || !empty($_SESSION['PD']) || !empty($_SESSION['SC'])){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HOMOLOGACIÓN</title>
  <link rel="shortcut icon" type="image/x-icon" href="logo_solemp.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="jquery.dataTables.min.css">
    <script src="jquery.js"></script>
  <script src="scripts_todo.js"></script>
  <script src="jquery.dataTables.min.js"></script>
  <!-- <script>
    $(document).ready( function () {
    $('.tabla').DataTable();
      } );
  </script> -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>

  <div class="todo">
<nav class="nav1">
  <header class="header2">
  <div class="wrapper">
  	<div class="logo"> <a href="#"><img src="icono_uae.png" href="#.php" class="logo_uae"></a>  </div>
    <div class="menu-logo">
      <a href="#"><i class="fa fa-user" aria-hidden="true"></i><?php echo " ".$_SESSION['NU']; ?></a>
    </div>
  </div>
  </header>
</nav>
<nav class="nav2">
<div class="contenedor-menu">
  <a href="#" class="btn-menu"> Menu <i class="fa fa-bars" aria-hidden="true"></i></a>
<ul class="menu">
  <li><a href="inicio.php"><i class="icono izquierda fa fa-home" aria-hidden="true"></i>Inicio</a></li>
    <?php  if(!empty($_SESSION['TD']) || !empty($_SESSION['S'])){ ?>
  <li><a href="#"><i class="icono izquierda fa fa-drivers-license-o"></i>Solicitantes<i class="icono derecha fa fa-chevron-down" aria-hidden="true"></i></a>
    <ul>
      <li><a href="ingreso_solicitante.php">Nueva Solicitud</a></li>
      <li><a href="lista_homologaciones.php">Confirmar Homologaciones</a></li>
    </ul>
  </li>
<?php } ?>
  <?php  if(!empty($_SESSION['TD']) || !empty($_SESSION['PD'])){ ?>
  <li><a href="#"><i class="icono izquierda fa fa-list-alt"></i>Homolog./Valid.<i class="icono derecha fa fa-chevron-down" aria-hidden="true"></i></a>
    <ul>
      <li><a href="lista_homologar.php">Homologación/Revisión</a></li>
      <li><a href="lista_validar.php">Validación de Conocimiento</a></li>
    </ul>
  </li>
  <li><a href="#"><i class="icono izquierda fa fa-sitemap"></i></span>Mallas<i class="icono derecha fa fa-chevron-down" aria-hidden="true"></i></a>
    <ul>
      <li><a href="ingreso_malla.php">Mallas Curriculares</a></li>
    </ul>
 <?php } ?>
 <?php  if(!empty($_SESSION['TD']) || !empty($_SESSION['SC'])){ ?>
  <li><a href="#"><i class="icono izquierda fa fa-stack-overflow"></i>Resolución<i class="icono derecha fa fa-chevron-down" aria-hidden="true"></i></a>
    <ul>
      <li><a href="lista_resolucionHV.php">Gestionar</a></li>
    </ul>
  </li>
   <?php } ?>
  <li><a href="#"><i class="icono izquierda fa fa-clipboard"></i>Reportes<i class="icono derecha fa fa-chevron-down" aria-hidden="true"></i></a>
    <ul>
      <li><a href="lista_reportes.php">Ver Reportes</a></li>
    </ul>
  </li>
  <?php  if(!empty($_SESSION['TD'])){ ?>
  <li><a href="#"><i class="icono izquierda fa fa-gears"></i>Administrar<i class="icono derecha fa fa-chevron-down" aria-hidden="true"></i></a>
    <ul>
      <li><a href="ingreso_cargo.php">Cargos</a></li>
      <li><a href="ingreso_carrera.php">Carreras</a></li>
      <li><a href="ingreso_usuario.php">Usuarios</a></li>
    </ul>
  </li>
     <?php } ?>
  <li><a href="salir.php"><i class="icono izquierda fa fa-power-off" aria-hidden="true"></i>Salir</a></li>
</ul>
</div>
</nav>
  <script src="menu.js"></script>
<div class="panel">
  <br/><br/><br>

  <!-- <div id="notificacion">
  	<span>SE A GUARDADO CORRECTAMENTE!</span>
  </div>
  <div id="notificacion2">
    <span>SE A MODIFICADO CORRECTAMENTE!</span>
  </div>
  <div id="notificacion3">
    <span>SE A ELIMINADO CORRECTAMENTE!</span>
  </div> -->
<?php }else {
header("Location: index.php");
} ?>
