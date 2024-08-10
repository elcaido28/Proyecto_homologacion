<?php
include('menu.php');
include('conexion.php');
?>
<br/>
<h3><i class="fa fa-user" aria-hidden="true"></i> MODIFICACION DE USUARIOS</h3>
<br/>
<p><h3>    ____________________________________________________________________</h3></p>
<br/>

<?php
  $idv=$_REQUEST['id'];
  include('conexion.php');
  $result= mysqli_query($con,"SELECT * from usuarios U inner join carreras C on U.id_carrera=C.id_carrera inner join cargos Ca on U.id_cargo=Ca.id_cargo where id_usuario='$idv'");
  $row= mysqli_fetch_assoc($result);
?>

<center>
<section class="formulario_grande">
  <p class="titulo_from">MODIFICAR USUARIO</p>
  <form action="modificarPro_usuario.php?id=<?php echo $row['id_usuario'];?>" class="con_form" method="post">
  <input type="text" class="cajapequec" placeholder="Codigo"  name="Codigo" value="<?php echo $row['id_usuario'];?>" onkeypress="return enable(event)" onpaste="return false"required/>

  <input type="text" class="cajapeque" placeholder="Nombres"  name="Nombres" value="<?php echo $row['nombreU'];?>" autofocus onkeypress="return sololetras(event)" onpaste="return false" required/>
  <input type="text" placeholder="Apellidos"  class="cajapeque" name="Apellidos" value="<?php echo $row['apellidoU'];?>" onkeypress="return sololetras(event)" onpaste="return false" required/>
  <input type="text" placeholder="NombresUsu"  class="cajapeque" name="NombresUsu" value="<?php echo $row['nombre_usus'];?>" required/>
  <input type="text" placeholder="claveUsu"  class="cajapeque" name="claveUsu" value="<?php echo $row['clave_usu'];?>" required/>

  <input type="text" placeholder="codigo" id="7" class="cajapequec" value="<?php echo $row['id_carrera'];?>" name="codigoC" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid2()' name="carrera" id="8" required><option><?php echo $row['nombreC'];?></option>
<?php $consulta4=mysqli_query($con,"SELECT * from carreras ");
      while($row4=mysqli_fetch_array($consulta4)){
      echo "<option value='".$row4['id_carrera']."' onclick='ponerid2()' >"; echo $row4['nombreC']; echo "</option>"; } ?> </select>

  <input type="text" placeholder="codigo" id="9" class="cajapequec" value="<?php echo $row['id_cargo'];?>" name="codigoCa" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid()' name="cargo" id="10" ><option><?php echo $row['cargo'];?></option>
  <?php $consulta5=mysqli_query($con,"SELECT * from cargos ");
      while($row5=mysqli_fetch_array($consulta5)){
      echo "<option value='".$row5['id_cargo']."' onclick='ponerid()' >"; echo $row5['cargo']; echo "</option>"; } ?> </select>
      <select class="combo" name="estado" ><option><?php echo $row['estado'];?></option><option>ACTIVO</option><option>INACTIVO</option>
  <input type="submit" class="aceptar" value="Modificar"/>
  </form>
  <form action="ingreso_usuario.php" method="post">
    <input class="btn_cerrar" type="submit" value="Cancelar" />
  </form>
</section>
</center>
<br/>
</div>
</div>
  </body>
</html>
