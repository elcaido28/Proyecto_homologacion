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
  $consulta=mysqli_query($con,"SELECT id_resolucionv from resolucionesv Order by id_resolucionv ASC");
  while($row2=mysqli_fetch_array($consulta)){
    $addID=$row2['id_resolucionv'];
    $addID+=+1;
  }  ?>
<center>
<section class="formulario_grande">
<p class="titulo_from">ESTABLECER RESOLUCION</p>
  <form action="guardar_resolucionV.php" class="con_form" method="post">
<input type="number" name="codigo" class="cajapequec" placeholder="Codigo" value="<?php echo $addID; ?>"  required>
<input type="text" name="fecha" class="cajapeque" onkeypress="return enable(event)" onpaste="return false" value="<?php echo date("Y")."-".date("m")."-".date("d");?>" required>
<input type="text" name="Nvalida" class="cajapeque" placeholder="Nº validacion" required>
<input type="date" name="fecha2" class="cajapeque" required>
<select class="combo" name="estado2" required><option  value="">-ESTADO-</option><option>FINALIZADA</option>
  <input type="text" placeholder="codigo" id="9" class="cajapequec" name="codigoU" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid()' name="NombreEmpleado" id="10" required><option value="" >-NOMBRE DE EMPLEADO-</option>
<?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_secre_conse='on' and U.estado='ACTIVO'");
      while($row4=mysqli_fetch_array($consulta4)){
       echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select>

<input type="number" name="id_valida" class="cajapequec" placeholder="id_validacion" value="<?php echo $idv; ?>" onkeypress="return enable(event)" onpaste="return false" required>

  <input type="submit" class="aceptar" value="Guardar"/>
  </form>
<form  action="lista_resolucionHV.php" method="post">
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
        $consulta=mysqli_query($con,"SELECT * from resolucionesv where id_validacion='$idv' ");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['fechaRV']; ?> </td>
              <td><?php echo $row['numeroRV']; ?> </td>
              <td><?php echo $row['estadoRV']; ?> </td>
              <td><a href="modificar_resolucionV.php?id=<?php echo $row['id_resolucionv'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"> CAMBIAR</i></a></td>
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
