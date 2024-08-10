<?php
session_start();
  $nomU = $_POST['nomUsu'];
  $pas = $_POST['contrasena'];
  if(empty($nomU) || empty($pas)){
  	header("Location: index.php");
  	exit();
  }

   include('../conexion.php');
   $result= mysqli_query($con,"SELECT * from estudiante where nom_ns_usu ='$nomU' and clave_cedula='$pas' ");
   $row= mysqli_fetch_assoc($result);

   if(isset($row['nom_ns_usu'])){

     $result2= mysqli_query($con,"SELECT * from solicitantes where NumeroS ='$nomU' and Cedula='$pas' ");
     $row2= mysqli_fetch_assoc($result2);
     $_SESSION['ES_USU']=$row2['Nombre']." ".$row2['Apellido'];
     $_SESSION['CEDU']=$row2['Cedula'];
     header("Location:vista_progreso_estudiantes.php");
   }else{
    header("Location: index.php");
   }
 ?>
