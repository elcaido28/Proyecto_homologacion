<?php
include('menu.php');
include('conexion.php');
?>
<br/>
<h3><i class="fa fa-drivers-license-o"></i> MODIFICACIÓN DE SOLICITANTES</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
  <?php
  $idv=$_REQUEST['id'];
  include('conexion.php');
  $result= mysqli_query($con,"SELECT * from solicitantes S inner join usuarios U on S.id_usuario=U.id_usuario where S.id_solicitante ='$idv'");
  $row= mysqli_fetch_assoc($result);
   ?>
<center>
<section class="formulario_grande">
  <p class="titulo_from">MODIFICAR SOLICITANTE</p>
  <form action="modificarPro_solicitante.php?id=<?php echo $row['id_solicitante'];?>" class="con_form" method="post" enctype="multipart/form-data">
  <input type="text" class="cajapequec" placeholder="Codigo"  name="Codigo" value="<?php echo $row['id_solicitante'];?>" onkeypress="return enable(event)" onpaste="return false" required/>
  <input type="text" placeholder="2017-01-01" class="cajapeque" onkeypress="return enable(event)" onpaste="return false" value="<?php echo $row['fechaS'];?>" name="fecha" onkeypress="return enable(event)" onpaste="return false" required/>
  <input type="text" class="cajapeque" placeholder="Nº Solicitante"  name="Nsolicitante" value="<?php echo $row['NumeroS'];?>" autofocus required/>
  <input type="text" placeholder="Cedula"  class="cajapeque" name="Cedula" value="<?php echo $row['Cedula'];?>" onkeypress="return solonumeroRUC(event)" onpaste="return false"required/>
  <input type="text" placeholder="Nombres"  class="cajapeque" name="Nombres" value="<?php echo $row['Nombre'];?>" onkeypress="return sololetras(event)" onpaste="return false" required/>
  <input type="text" placeholder="Apellidos"  class="cajapeque" name="Apellidos" value="<?php echo $row['Apellido'];?>" onkeypress="return sololetras(event)" onpaste="return false" required/>
  <input type="email" placeholder="Correo" autofocus class="cajapeque" name="Correo" value="<?php echo $row['correo'];?>" required/>
  <select class="combo" name="carreA" required><option><?php echo $row['CarreraA'];?></option>
  <?php $consulta6=mysqli_query($con,"SELECT * from carreras where nombreC !='Facultad de ciencias agrarias'");
    while($row6=mysqli_fetch_array($consulta6)){
    echo "<option onclick='veri_ci()'>"; echo $row6['nombreC']; echo "</option>"; } ?> </select>
  <input type="text" placeholder="Carrera/Proviene"  class="cajapeque" name="CarreraProviene" value="<?php echo $row['carreraP'];?>" onkeypress="return sololetras(event)" onpaste="return false" required/>
  <input type="text" placeholder="Universidad/Proviene" class="cajapeque" name="UniversidadProviene" value="<?php echo $row['universiP'];?>" onkeypress="return sololetras(event)" onpaste="return false" required/>
<input type="text" placeholder="Ultimo Año de Estudio" class="cajapeque" name="utlti_ano" value="<?php echo $row['ult_ano'];?>" onkeypress="return solonumero(event)" onpaste="return false" required/>
  <select class="combo" name="tipoU" required><option><?php echo $row['tipoU'];?></option><option>PRIVADA</option><option>PUBLICA</option></select>
  <select class="combo" name="estado" required><option><?php echo $row['estado'];?></option><option>ACTIVO</option><option>INACTIVO</option></select>
  <input type="text" placeholder="codigo" id="9" class="cajapequec" name="codigoU" value="<?php echo $row['id_usuario'];?>" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid()' name="NombreEmpleado" id="10" required><option><?php echo $row['nombreU']." ".$row['apellidoU']; ?></option>
<?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_secre='on' and U.estado='ACTIVO'");
      while($row4=mysqli_fetch_array($consulta4)){
       echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select>
  <input type="submit" class="aceptar" value="Modificar"/>
  </form>
  <form action="ingreso_solicitante.php" method="post">
    <input class="btn_cerrar" type="submit" value="Cancelar" />
  </form>
</section>
</center>
<br/>
<br/>


</div>
</div>
  </body>
</html>
