<?php
include('menu.php');
include('conexion.php');
?>

  <br/>
<h3><i class="fa fa-gears"></i> REGISTRO DE CARRERAS</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>

<?php
$consulta=mysqli_query($con,"SELECT id_carrera from carreras Order by id_carrera ASC");
while($row2=mysqli_fetch_array($consulta)){
  $addID=$row2['id_carrera'];
  $addID+=+1;
}  ?>

<center>
<section class="formulario1">
<p class="titulo_from">NUEVA CARRERA</p>
  <form action="guardar_carrera.php" class="con_form" method="post">
  <input type="number" class="cajapequec2" placeholder="Codigo" value="<?php echo $addID;?>" onkeypress="return enable(event)" onpaste="return false" name="Codigo" required/>
  <input type="text" class="cajapeque2" onkeypress="return sololetras(event)" placeholder="Nombre Carrera" name="NombreCarrera" required/>
  <input type="submit" class="aceptar2" value="Aceptar"/>
  </form>
<form  action="ingreso_carrera.php" method="post">
  <input class="btn_cerrar2" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br>
<br/>
<table class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>
			<th>CODIGO/CARRERA</th>
      <th>CARRERA</th>
			<th>EDITAR / BORRAR</th>
      <th>ASIGNAR</th>
			</tr>
      </thead>
      <tr>
        <?php
        include('conexion.php');
        $consulta=mysqli_query($con,"SELECT * from carreras ");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['id_carrera']; ?> </td>
              <td><?php echo $row['nombreC']; ?> </td>
        			<td><a href="eliminar_carrera.php?id=<?php echo $row['id_carrera'];?>" class="eliminar"><i class="fa fa-trash-o" aria-hidden="true"> BORRAR</i></a>  </td>
              <td><a href="ingreso_semestre.php?id=<?php echo $row['id_carrera'];?>" class="establecer"><i class="fa fa-stack-exchange" aria-hidden="true"> SEMESTRES</i></a></td>
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
