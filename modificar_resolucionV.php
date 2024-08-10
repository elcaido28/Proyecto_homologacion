<?php
include('menu.php');
include('conexion.php');
  $idv=$_REQUEST['id'];
?>
<br/>

<h3><i class="fa fa-stack-overflow"></i> RESOLUCIONES DE VALIDACIONES DE CONOCIMIENTO</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>

  <?php
  $idv=$_REQUEST['id'];
  include('conexion.php');
  $result= mysqli_query($con,"SELECT * from resolucionesv RV inner join usuarios U on RV.id_usuario=U.id_usuario where RV.id_resolucionv ='$idv'");
  $row= mysqli_fetch_assoc($result);
   ?>

<center>
<section class="formulario_grande">
<p class="titulo_from">ESTABLECER RESOLUCION</p>
  <form action="modificarPro_resolucionV.php" class="con_form" method="post">
<input type="number" name="codigo" class="cajapequec" placeholder="Codigo" value="<?php echo $row['id_resolucionv']; ?>"  required>
<input type="date" name="fecha" class="cajapeque" value="<?php echo $row['fechaRV']; ?>" required>
<input type="text" name="Nvalida" class="cajapeque" placeholder="Nº validacion" value="<?php echo $row['numeroRV']; ?>" required>
<input type="date" name="fecha2" class="cajapeque" value="<?php echo $row['fechaCons']; ?>" required>
<select class="combo" name="estado2" required><option ><?php echo $row['estadoRV']; ?></option><option>FINALIZADA</option>
  <input type="text" placeholder="codigo" id="9" class="cajapequec" name="codigoU" value="<?php echo $row['id_usuario']; ?>" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid()' name="NombreEmpleado" id="10" required><option><?php echo $row['nombreU']." ".$row['apellidoU'];?></option>
<?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_secre_conse='on' and U.estado='ACTIVO'");
      while($row4=mysqli_fetch_array($consulta4)){
       echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select>

<input type="number" name="id_valida" class="cajapequec" placeholder="id_validacion" value="<?php echo $row['id_validacion']; ?>" onkeypress="return enable(event)" onpaste="return false" required>

  <input type="submit" class="aceptar" value="Modificar"/>
  </form>
<form  action="ingreso_resolucionV.php?id=<?php echo $row['id_validacion']; ?>" method="post">
  <input class="btn_cerrar" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br>
<br>
  </div>
</div>
</body>
</html>
