<?php
include('menu.php');
include('conexion.php');
?>
  <br>
<h3><i class="fa fa-user" aria-hidden="true"></i> REGISTRO DE USUARIOS</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>

<?php
$consulta=mysqli_query($con,"SELECT id_usuario from usuarios Order by id_usuario ASC");
while($row2=mysqli_fetch_array($consulta)){
  $addID=$row2['id_usuario'];
  $addID+=+1;
} ?>




<center>
<section class="formulario_grande">
  <p class="titulo_from">NUEVA USUARIO</p>
  <form action="guardar_usuario.php" class="con_form" method="post" enctype="multipart/form-data">
  <input type="text" class="cajapequec" placeholder="Codigo"  name="Codigo" value="<?php echo $addID;?>" onkeypress="return enable(event)" onpaste="return false" required/>

  <input type="text" class="cajapeque" placeholder="Nombres"  name="Nombres" onkeypress="return sololetras(event)" onpaste="return false" value="" autofocus required/>
  <input type="text" placeholder="Apellidos"  class="cajapeque" name="Apellidos" onkeypress="return sololetras(event)" onpaste="return false" required/>
  <input type="text" placeholder="NombresUsu"  class="cajapeque" name="NombresUsu" required/>
  <input type="text" placeholder="claveUsu"  class="cajapeque" name="claveUsu" required/>

  <input type="text" placeholder="codigo" id="7" class="cajapequec" name="codigoC" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid2()' name="carrera" id="8" required ><option value="" >-CARRERAS-</option>
<?php $consulta4=mysqli_query($con,"SELECT * from carreras ");
      while($row4=mysqli_fetch_array($consulta4)){
      echo "<option value='".$row4['id_carrera']."' onclick='ponerid2()' >"; echo $row4['nombreC']; echo "</option>"; } ?> </select>

  <input type="text" placeholder="codigo" id="9" class="cajapequec" name="codigoCa" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid()' name="cargo" id="10" required ><option value="" >-CARGOS-</option>
  <?php $consulta5=mysqli_query($con,"SELECT * from cargos ");
      while($row5=mysqli_fetch_array($consulta5)){
      echo "<option value='".$row5['id_cargo']."' onclick='ponerid()' >"; echo $row5['cargo']; echo "</option>"; } ?> </select>
      <select class="combo" name="estado" required ><option value="" >-ESTADO-</option><option>ACTIVO</option><option>INACTIVO</option>
  <input type="submit" class="aceptar" value="Guardar"/>
  </form>
  <form action="ingreso_usuario.php" method="post">
    <input class="btn_cerrar" type="submit" value="Cancelar" />
  </form>
</section>
</center>
<br/>
<section class="busqueda">
  <form  method="post">
  <input type="text" name="busqtipo" value="" />
  <input type="submit"  value="Buscar"  />
  </form>
</section>
<br/>

<table class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>
      <th>NOMBRES</th>
      <th>APELLIDOS</th>
      <th>NOMBRE DE USUARIO</th>
      <th>CONTRASEÑA</th>
      <th>CARRERAS</th>
      <th>CARGOS</th>
			<th>OPERACIONES</th>
      <th>ASIGNAR</th>
			</tr>
      </thead>
      <tr>
        <?php
        if(empty($_POST['busqtipo'])){
              $busqtipo="";

         }else {
            $busqtipo=$_POST['busqtipo'];
          }
        include('conexion.php');
        $consulta=mysqli_query($con,"SELECT * from usuarios U inner join carreras C on U.id_carrera=C.id_carrera inner join cargos Ca on U.id_cargo=Ca.id_cargo where U.nombreU like '%".$busqtipo."%' or U.apellidoU like '%".$busqtipo."%' ORDER BY U.apellidoU ASC");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['nombreU']; ?> </td>
              <td><?php echo $row['apellidoU']; ?> </td>
              <td><?php echo $row['nombre_usus']; ?> </td>
              <td><?php echo $row['clave_usu']; ?> </td>
              <td><?php echo $row['nombreC']; ?> </td>
              <td><?php echo $row['cargo']; ?> </td>
<td><a href="modificar_usuario.php?id=<?php echo $row['id_usuario'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true">CAMBIAR</i></a></td>
<td><a href="ingreso_recurso.php?id=<?php echo $row['id_usuario'];?>" class="establecer"><i class="fa fa-pencil-square-o" aria-hidden="true">RECURSOS</i></a></td>

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
