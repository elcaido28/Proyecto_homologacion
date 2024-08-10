<?php
include('menu.php');
include('conexion.php');
?>
  <br/>

<h3><i class="fa fa-list-alt"></i> MODIFICACIÓN DE MATERIAS</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
  <?php
  $idv=$_REQUEST['data'];
  $result= mysqli_query($con,"SELECT * from malla_homolo where id_malla_homo ='$idv'");
  $row= mysqli_fetch_assoc($result);
   ?>
<center>
<section class="formulario1">
<p class="titulo_from">MODIFICAR DATOS DE MATERIA</p>
  <form action="modificarPro_homologa2.php" class="con_form" method="post">
  <input type="number" class="cajapequec2" placeholder="Codigo" value="<?php echo $row['id_malla_homo'];?>" onkeypress="return enable(event)" onpaste="return false" name="Codigo" required/>
  <input type="text" class="cajapeque2" placeholder="Calificación"value="<?php echo $row['calificacion'];?>"  autofocus name="Calificacion" onkeypress="return solonumero(event)" onpaste="return false" required/>
  <input type="text" class="cajapeque2" placeholder="Horas"value="<?php echo $row['horas'];?>"  name="Horas" onkeypress="return solonumero(event)" onpaste="return false" required/>
  <input type="text" class="cajapequec2"  name="id_malla" value="<?php echo $row['id_malla'];?>" onkeypress="return enable(event)" onpaste="return false"required/>
  <input type="text" class="cajapequec2"  name="id_homolo" value="<?php echo $row['id_homologacion'];?>" onkeypress="return enable(event)" onpaste="return false"required/>
  <input type="submit" class="aceptar2" value="Modificar"/>
  </form>
<form  action="ingreso_homologa2.php" method="post">
  <input class="btn_cerrar2" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br><br>

  </div>
</div>
</body>
</html>
