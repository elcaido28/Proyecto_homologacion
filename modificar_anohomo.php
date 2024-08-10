<?php
include('menu.php');
include('conexion.php');
  $idv=$_REQUEST['id'];
?>
<br/>

<h3><i class="fa fa-cubes" aria-hidden="true"></i>ASIGNACION DE AÑO A ESTUDIAR</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
  <?php
  $result= mysqli_query($con,"SELECT * from anohomolo where id_anohomolo='$idv'");
  $row= mysqli_fetch_assoc($result);
   ?>
<center>
<section class="formulario1">
<p class="titulo_from">MODIFICAR AÑO</p>
  <form action="modificarPro_anohomo.php?id=<?php echo $idv; ?>" class="con_form" method="post">
  <select class="combo2" name="ano" required><option ><?php echo $row['anohomo'];?></option><option>PRIMER AÑO</option><option>SEGUNDO AÑO</option><option>TERCER AÑO</option><option>CUARTO AÑO</option><option>QUINTO AÑO</option>
  <input type="submit" class="aceptar2" value="Modificar"/>
  </form>
<form  action="ingreso_homologa2.php" method="post">
  <input class="btn_cerrar2" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br>
<br/>
  </div>
</div>
</body>
</html>
