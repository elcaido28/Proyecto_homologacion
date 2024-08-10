<?php
include('menu.php');
include('conexion.php');
?>
  <br/>
<h3><i class="fa fa-list-alt"></i> MODIFICACIÓN DE HOMOLOGACIÓN</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>


<?php
$idv=$_REQUEST['id'];
include('conexion.php');
$result= mysqli_query($con,"SELECT * from homologaciones H inner join usuarios U on H.id_usuario=U.id_usuario where H.id_homologacion ='$idv'");
$row= mysqli_fetch_assoc($result);

 ?>

<center>
<section class="formulario_grande">
<p class="titulo_from">MODIFICAR HOMOLOGACIÓN</p>
  <form action="modificarPro_homologa1.php?id=<?php echo $row['id_homologacion'];?>" class="con_form" method="post">
<p class="p">____________DATOS__DE__HOMOLOGACION_________</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
  <input type="number" class="cajapequec" placeholder="Codigo" value="<?php echo $row['id_homologacion'];?>" onkeypress="return enable(event)" onpaste="return false" name="Codigo" required/>
  <input type="date" class="cajapeque" placeholder="Fecha" name="Fecha" value="<?php echo $row['fechaH'];?>" required/>
<input type="text" class="cajapeque" placeholder="Nº Oficio"  name="Noficio" value="<?php echo $row['numero_ofi'];?>" required/>
<input type="text" class="cajapequec" placeholder="id_solicitud" value="<?php echo $row['id_solicitante'];?>" onkeypress="return enable(event)" onpaste="return false" name="id_solicitud" value="<?php echo $row['id_solicitante'];?>" required/>
<input type="text" placeholder="codigo" id="9" class="cajapequec" value="<?php echo $row['id_usuario'];?>" name="codigoU" onkeypress="return enable(event)" onpaste="return false" required/>
<select class="combo" onclick='ponerid()' name="NombreEmpleado" id="10" required><option><?php echo $row['nombreU'];?></option>
<?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_profe_dele='on' and U.estado='ACTIVO'");
    while($row4=mysqli_fetch_array($consulta4)){
     echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select>
 <textarea name="observacion"  class="cajadescrip" placeholder="OBSERVACIÓN"><?php echo $row['observacion'];?></textarea>
 <select class="combo" name="estado" required><option><?php echo $row['estado1'];?></option><option>EN CURSO</option><option>FINALIZADA</option></select>
 <input type="text" name="estado2" class="cajapequec" value="<?php echo $row['estado2'];?>" onkeypress="return enable(event)" onpaste="return false">
  <input type="submit" class="aceptar" value="Modificar"/>
  </form>
<form  action="ingreso_homologa1.php?id=<?php echo $row['id_solicitante'];?>" method="post">
  <input class="btn_cerrar" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br><br/>

  </div>
</div>
</body>
</html>
