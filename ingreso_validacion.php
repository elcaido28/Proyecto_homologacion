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
  $consulta=mysqli_query($con,"SELECT id_validacion from validaciones Order by id_validacion ASC");
  while($row2=mysqli_fetch_array($consulta)){
    $addID=$row2['id_validacion'];
    $addID+=+1;
  }  ?>
<center>
<section class="formulario_grande">
<p class="titulo_from">ESTABLECER REVISIÓN</p>
  <form action="guardar_validacion.php" class="con_form" method="post">
<input type="number" name="codigo" class="cajapequec" placeholder="Codigo" value="<?php echo $addID; ?>"  required>
<input type="date" name="fecha" class="cajapeque" required>
<input type="text" name="Nvalida" class="cajapeque" placeholder="Nº validacion" required>
<select class="combo" name="estado2" required><option  value="">-ESTADO-</option><option>FINALIZADA</option>
  <input type="text" name="estado" class="cajapequec" placeholder="Estado" value="PENDIENTE" onkeypress="return enable(event)" onpaste="return false" required>
  <input type="text" placeholder="codigo" id="9" class="cajapequec" name="codigoU" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid()' name="NombreEmpleado" id="10" required><option value="" >-NOMBRE DE EMPLEADO-</option>
<?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_profe_dele='on' and U.estado='ACTIVO'");
      while($row4=mysqli_fetch_array($consulta4)){
       echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select>

<input type="number" name="id_solicitante" class="cajapequec" placeholder="id_solicitante" value="<?php echo $idv; ?>" onkeypress="return enable(event)" onpaste="return false" required>

  <input type="submit" class="aceptar" value="Guardar"/>
  </form>
<form  action="lista_validar.php" method="post">
  <input class="btn_cerrar" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br>
<br/>
<table class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>
			<th>FECHA</th>
      <th>NUMERO DE VALIDACION</th>
      <th>ESTADO</th>
			<th>EDITAR / BORRAR</th>
			</tr>
      </thead>
      <tr>
        <?php
        include('conexion.php');
        $consulta=mysqli_query($con,"SELECT * from validaciones where id_solicitante='$idv' ");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['fechaV']; ?> </td>
              <td><?php echo $row['numeroV']; ?> </td>
              <td><?php echo $row['estadoV']; ?> </td>
              <td><a href="modificar_validacion.php?id=<?php echo $row['id_validacion'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"> CAMBIAR</i></a></td>
  </tr>
        <?php
        			}
        ?>
</table>
<br/><br/>
  </div>
</div>
</body>
</html>
