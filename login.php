<?php
session_start();
  $nomU = $_POST['nomUsu'];
  $pas = $_POST['contrasena'];
  if(empty($nomU) || empty($pas)){
  	header("Location: index.php");
  	exit();
  }

   include('conexion.php');
   $result= mysqli_query($con,"SELECT * from usuarios where nombre_usus ='$nomU' and estado='ACTIVO'");
   $row= mysqli_fetch_assoc($result);
   $abc=$row['id_usuario'];


   if($row['clave_usu']==$pas){
     $result2= mysqli_query($con,"SELECT * from usuarios U INNER JOIN recursos R on U.id_usuario=R.id_usuario INNER JOIN carreras C on C.id_carrera=U.id_carrera where  U.id_usuario='$abc'");
     $row4= mysqli_fetch_assoc($result2);
     // $_SESSION['IDemp']=$row4['id_empleado'];
     $_SESSION['NU']=$row4['nombreU']." ".$row4['apellidoU'];
     $_SESSION['CA']=$row4['nombreC'];
     $_SESSION['TD']=$row4['todoR'];
     $_SESSION['S']=$row4['recurso_secre'];
     $_SESSION['PD']=$row4['recurso_profe_dele'];
     $_SESSION['SC']=$row4['recurso_secre_conse'];
     header("Location:inicio.php");
   }else{
     header("Location: index.php");
   }
 ?>
