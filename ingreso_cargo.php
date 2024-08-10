<?php
include('menu.php');
include('conexion.php');
?>

  <br/>
<h3><i class="fa fa-gears"></i> REGISTRO DE CARGOS</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>

<?php
$consulta=mysqli_query($con,"SELECT id_cargo from cargos Order by id_cargo ASC");
while($row2=mysqli_fetch_array($consulta)){
  $addID=$row2['id_cargo'];
  $addID+=+1;
}  ?>

<center>
<section class="formulario1">
<p class="titulo_from">NUEVA CARGO</p>
  <form action="guardar_cargo.php" class="con_form" method="post">
  <input type="number" class="cajapequec2" placeholder="Codigo" value="<?php echo $addID;?>" onkeypress="return enable(event)" onpaste="return false" name="Codigo" required/>
  <input type="text" class="cajapeque2" placeholder="Nombre Cargo" name="Nombrecargo" required/>
  <input type="submit" class="aceptar2" value="Aceptar"/>
  </form>
<form  action="ingreso_cargo.php" method="post">
  <input class="btn_cerrar2" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br>
<br/>
<table class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>
			<th>CODIGO/CARGO</th>
      <th>CARGO</th>
			<th>EDITAR / BORRAR</th>
			</tr>
      </thead>
      <tr>
        <?php
        include('conexion.php');
        $consulta=mysqli_query($con,"SELECT * from cargos ");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['id_cargo']; ?> </td>
              <td><?php echo $row['cargo']; ?> </td>
        			<td><a href="eliminar_cargo.php?id=<?php echo $row['id_cargo'];?>" class="eliminar"><i class="fa fa-trash-o" aria-hidden="true"> BORRAR</i></a>  </td>
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
