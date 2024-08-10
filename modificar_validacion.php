<?php
include('menu.php');
include('conexion.php');
  $idv=$_REQUEST['id'];
?>
<br/>

<h3><i class="fa fa-cubes" aria-hidden="true"></i>REVISIÓN DE HOMOLOGACIONES Y REVISION DE MALLAS</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>

  <?php
  $idv=$_REQUEST['id'];
  include('conexion.php');
  $result= mysqli_query($con,"SELECT * from validaciones V inner join usuarios U on V.id_usuario=U.id_usuario where V.id_validacion ='$idv'");
  $row= mysqli_fetch_assoc($result);
   ?>
<center>
<section class="formulario_grande">
<p class="titulo_from">ESTABLECER REVISIÓN</p>
  <form action="modificarPro_validacion.php" class="con_form" method="post">
<input type="number" name="codigo" class="cajapequec" placeholder="Codigo" value="<?php echo $row['id_validacion'];?>"  required>
<input type="date" name="fecha" class="cajapeque" value="<?php echo $row['fechaV'];?>" required>
<input type="text" name="Nvalida" class="cajapeque" placeholder="Nº validacion" value="<?php echo $row['numeroV'];?>" required>
<select class="combo" name="estado2" required><option ><?php echo $row['estadoV'];?></option><option>FINALIZADA</option>
  <input type="text" name="estado" class="cajapequec" placeholder="Estado" value="<?php echo $row['estadoR'];?>" onkeypress="return enable(event)" onpaste="return false" required>
  <input type="text" placeholder="codigo" id="9" class="cajapequec" name="codigoU" value="<?php echo $row['id_usuario'];?>" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid()' name="NombreEmpleado" id="10" required><option><?php echo $row['nombreU']." ".$row['apellidoU'];?></option>
<?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_profe_dele='on' and U.estado='ACTIVO'");
      while($row4=mysqli_fetch_array($consulta4)){
       echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select>

<input type="number" name="id_solicitante" class="cajapequec" placeholder="id_solicitante" value="<?php echo $row['id_solicitante'];?>" onkeypress="return enable(event)" onpaste="return false" required>

  <input type="submit" class="aceptar" value="Modificar"/>
  </form>
<form  action="ingreso_validacion.php?id=<?php echo $row['id_solicitante']; ?>" method="post">
  <input class="btn_cerrar" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br>
<br/>
  </div>
</div>
</body>
</html>
