<?php
include('menu.php');
include('conexion.php');
?>
  <br/>
<h3><i class="fa fa-list-alt"></i> REGISTRO DE HOMOLOGACION</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
<?php
$consulta=mysqli_query($con,"SELECT id_homologacion from homologaciones Order by id_homologacion ASC");
while($row2=mysqli_fetch_array($consulta)){
  $addID=$row2['id_homologacion'];
  $addID+=+1;
} ?>

<?php
$idv=$_REQUEST['id'];
$result= mysqli_query($con,"SELECT * from solicitantes where id_solicitante ='$idv'");
$row= mysqli_fetch_assoc($result);
 ?>

<center>
<section class="formulario_grande">
<p class="titulo_from">NUEVA HOMOLOGACION</p>
  <form action="guardar_homologa1.php" class="con_form" method="post">
    <p class="p">________INFORMACIÓN__DEL__SOLICITANTE________</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<input type="text" placeholder="Nº solicitud"  class="cajapequec" name="numero" value="<?php echo $row['NumeroS'];?>"  onkeypress="return enable(event)" onpaste="return false" required/>
<input type="text" placeholder="Cedula"  class="cajapequec" name="Cedula" value="<?php echo $row['Cedula'];?>"  onkeypress="return enable(event)" onpaste="return false" required/>
<input type="text" placeholder="Nombres"  class="cajapequec" name="Nombres" value="<?php echo $row['Nombre'];?>"  onkeypress="return enable(event)" onpaste="return false" required/>
<input type="text" placeholder="Apellidos"  class="cajapequec" name="Apellidos" value="<?php echo $row['Apellido'];?>"  onkeypress="return enable(event)" onpaste="return false" required/>
<p class="p">____________DATOS__DE__HOMOLOGACION_________</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
  <input type="number" class="cajapequec" placeholder="Codigo" value="<?php echo $addID;?>" onkeypress="return enable(event)" onpaste="return false" name="Codigo" required/>
  <input type="date" class="cajapeque" placeholder="Fecha" autofocus name="Fecha" required/>
<input type="text" class="cajapeque" placeholder="Nº Oficio"  name="Noficio" required/>
<input type="text" class="cajapequec" placeholder="id_solicitud" onkeypress="return enable(event)" onpaste="return false" name="id_solicitud" value="<?php echo $row['id_solicitante'];?>" required/>
<input type="text" placeholder="codigo" id="9" value="" class="cajapequec" name="codigoU" onkeypress="return enable(event)" onpaste="return false" required/>
<select id="10" onclick='ponerid()' class="combo" name="NombreEmpleado" required><option value="" >-NOMBRE DE EMPLEADO-</option>
<?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_profe_dele='on' and U.estado='ACTIVO'");
    while($row4=mysqli_fetch_array($consulta4)){
     echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select>
<textarea name="observacion"  class="cajadescrip" placeholder="OBSERVACIÓN"></textarea>
<select class="combo" name="estado" required><option value="" >-ESTADO-</option><option>EN CURSO</option><option>FINALIZADA</option></select>
<input type="text" name="estado2" class="cajapequec" value="PENDIENTE" onkeypress="return enable(event)" onpaste="return false">
  <input type="submit" class="aceptar" value="Guardar y Continuar"/>
  </form>
<form  action="lista_homologar.php" method="post">
  <input class="btn_cerrar" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br>
<section class="busqueda">
  <form  method="post">
  <input type="text" name="busqtipo" value="" />
  <input type="submit"  value="Buscar"  />
  </form>
</section>
<br>

<table class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>
      <th>Nº SOLICITUD</th>
      <th>NOMBRES SOLICITANTE</th>
      <th>FECHA</th>
      <th>Nº OFICIO</th>
      <th>OBSERVACIÓN</th>
			<th>EDITAR / BORRAR</th>
      <th>MARETIAS</th>
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
        $consulta=mysqli_query($con,"SELECT * from solicitantes S inner join homologaciones H on S.id_solicitante=H.id_solicitante inner join usuarios U on S.id_usuario=U.id_usuario
         where S.NumeroS like '%".$busqtipo."%' and S.id_solicitante='$idv' or S.Cedula like '%".$busqtipo."%'  and S.id_solicitante='$idv' or S.Apellido like '%".$busqtipo."%'  and S.id_solicitante='$idv' ORDER BY S.Apellido ASC ");
         while($row=mysqli_fetch_array($consulta)){
        ?>
              <td><?php echo $row['NumeroS']; ?> </td>
              <td><?php echo $row['Nombre']." ".$row['Apellido']; ?> </td>
              <td><?php echo $row['fechaH']; ?> </td>
              <td><?php echo $row['numero_ofi']; ?> </td>
              <td><?php echo $row['observacion']; ?> </td>
        			<td><a href="modificar_homologa1.php?id=<?php echo $row['id_homologacion'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"> CAMBIAR</i></a></td>
              <td><a href="ingreso_homologa2.php?id=<?php echo $row['id_homologacion'];?>" class="establecer"><i class="fa fa-stack-exchange" aria-hidden="true"> ESTABLECER</i></a></td>
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
