<?php
include('menu.php');
include('conexion.php');
?>
  <br>
<h3><i class="icono izquierda fa fa-gears"></i> REGISTRO DE MALLA CURRICULAR</h3>
  <br>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br>
  <?php
  $idv=$_REQUEST['id'];
  include('conexion.php');
  $result=mysqli_query($con,"SELECT * from usuarios U inner join cargos Ca on U.id_cargo=Ca.id_cargo where U.id_usuario='$idv'");
  $row= mysqli_fetch_assoc($result);
   ?>
<?php
$consulta=mysqli_query($con,"SELECT id_recurso from recursos Order by id_recurso ASC");
while($row2=mysqli_fetch_array($consulta)){
  $addID=$row2['id_recurso'];
  $addID+=+1;
}  ?>

<center>
<section class="formulario_grande">
<p class="titulo_from">NUEVA MALLA CURRICULAR</p>
  <form action="guardar_recurso.php" class="con_form" method="post">
  <input type="number" class="cajapequec" placeholder="Codigo" value="<?php echo $addID;?>" onkeypress="return enable(event)" onpaste="return false" name="Codigo" required/>
  <input type="text" class="cajapequec" placeholder="Nombres" name="Nombres" value="<?php echo $row['nombreU']." ".$row['apellidoU']; ?>" onkeypress="return enable(event)" onpaste="return false" required/>
  <input type="text" class="cajapequec" placeholder="Cargo" id="ca" name="Cargo" value="<?php echo $row['cargo']; ?>" onkeypress="return enable(event)" onpaste="return false" required/>
  <input type="number" class="cajapequec" placeholder="Codigo" onkeypress="return enable(event)" onpaste="return false" name="Codigo2" value="<?php echo $idv;?>" required/>
  <p>ADMINISTRADOR</p>
  <input type="checkbox" class="cajapeque" id="ad" name="admin"/>
  <p>SECRETARI@</p>
  <input type="checkbox" class="cajapeque" id="se" name="secre"/>
  <p>PROFESOR DELEGADO</p>
  <input type="checkbox" class="cajapeque" id="pro" name="ProfeD"/>
  <p>SECRETARI@ CONSEJO</p>
  <input type="checkbox" class="cajapeque" id="sec" name="secreC"/>
  <input type="submit" class="aceptar" value="Aceptar"/>
  </form>
<form  action="ingreso_usuario.php" method="post">
  <input class="btn_cerrar" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br><br>

<table class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>
      <th>NOMBRES</th>
      <th>ADMINISTRADOR</th>
      <th>SECRETARI@</th>
      <th>PROFESOR DELEGADO</th>
      <th>SECRETARI@ CONSEJO</th>
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
        $consulta=mysqli_query($con,"SELECT * from recursos R inner join usuarios U on R.id_usuario=U.id_usuario where U.id_usuario='$idv'");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['nombreU']." ".$row['apellidoU']; ?> </td>
              <td><?php if ($row['todoR']=="on"){ ?> <i class="fa fa-check-square-o"></i> <?php } ?>  </td>
              <td><?php if ($row['recurso_secre']=="on"){ ?> <i class="fa fa-check-square-o"></i> <?php } ?> </td>
              <td><?php if ($row['recurso_profe_dele']=="on"){ ?> <i class="fa fa-check-square-o"></i> <?php } ?></td>
              <td><?php if ($row['recurso_secre_conse']=="on"){ ?> <i class="fa fa-check-square-o"></i> <?php } ?></td>

  </tr>
        <?php
        			}
        ?>
</table>
<br/><br/>
<script type="text/javascript">
  var cargo=document.getElementById('ca').value;
  if (cargo=="SECRETARIA") {
    document.getElementById('se').checked=true;
  }
  if (cargo=="PROFESOR DELEGADO") {
    document.getElementById('pro').checked=true;
  }
  if (cargo=="SECRETARIA CONSEJO") {
    document.getElementById('sec').checked=true;
  }
  if (cargo=="ADMINISTRADOR") {
    document.getElementById('ad').checked=true;
  }
</script>
<br>
<br>

  </div>
</div>
</body>
</html>
