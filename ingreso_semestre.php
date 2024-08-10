<?php
include('menu.php');
include('conexion.php');
$idv=$_REQUEST['id'];
?>

  <br/>
<h3><i class="fa fa-gears"></i> REGISTRO DE SEMESTRES</h3>
  <br/><a href="ingreso_carrera.php" class="otros"><i class="fa fa-sign-out" aria-hidden="true">IR A CARRERAS</i></a>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>

<?php
$consulta2=mysqli_query($con,"SELECT id_semestre from semestre Order by id_semestre ASC");
while($row2=mysqli_fetch_array($consulta2)){
  $addID=$row2['id_semestre'];
  $addID+=+1; }
?>

<center>
<section class="formulario1">
<p class="titulo_from">INGRESO DE SEMESTRES</p>
  <form action="guardar_semestre.php" class="con_form" method="post">
  <input type="number" class="cajapequec2" placeholder="Codigo" value="<?php echo $addID;?>" onkeypress="return enable(event)" onpaste="return false" name="Codigo" required/>
  <input type="text" class="cajapeque2" placeholder="Cantidad de Semestre" name="NumeroSemestre"  onkeypress="return solonumero(event)" onpaste="return false" required/>
  <input type="number" class="cajapequec2" placeholder="Codigo Carrera" value="<?php echo $idv;?>" onkeypress="return enable(event)" onpaste="return false" name="Codigoid" required/>
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
			<th>CODIGO/SEMESTRE</th>
      <th>SEMESTRE</th>
			<th>EDITAR / BORRAR</th>
			</tr>
      </thead>
      <tr>
        <?php
        include('conexion.php');
        $consulta=mysqli_query($con,"SELECT * from semestre where id_carrera='$idv'");
         while($row=mysqli_fetch_array($consulta)){
        ?>
              <td><?php echo $row['id_semestre']; ?> </td>
              <td><?php echo $row['nombreSM']; ?> </td>
        			<td><a href="eliminar_semestre.php?id=<?php echo $row['id_semestre'];?>" class="eliminar"><i class="fa fa-trash-o" aria-hidden="true"> BORRAR</i></a>  </td>
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
