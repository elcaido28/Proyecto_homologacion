<?php
include('menu.php');
include('conexion.php');
?>
  <br/>
<h3><i class="fa fa-drivers-license-o"></i> REGISTRO DE SOLICITANTES</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>

<?php
$consulta=mysqli_query($con,"SELECT id_solicitante from solicitantes Order by id_solicitante ASC");
while($row2=mysqli_fetch_array($consulta)){
  $addID=$row2['id_solicitante'];
  $addID+=+1;
} ?>
<center>
<section class="formulario_grande">
  <p class="titulo_from">NUEVA SOLICITANTE</p>
  <form action="guardar_solicitante.php" class="con_form" method="post" >
  <input type="text" class="cajapequec" placeholder="Codigo"  name="Codigo" value="<?php echo $addID;?>"  onkeypress="return enable(event)" onpaste="return false" required/>
  <input type="text" placeholder="2017-01-01" class="cajapeque" onkeypress="return enable(event)" onpaste="return false" value="<?php echo date("Y")."-".date("m")."-".date("d");?>" name="fecha" required/>

  <div class="">
        <input type="text" class="cajapeque" placeholder="Nº Solicitud"  name="Nsolicitante" value="" autofocus required/>
        <label for="" class="F_label"> Nº Solicitud</label>
  </div>
  <div class="">
        <input type="text" placeholder="Cedula o Pasaporte" id="ci" class="cajapeque" name="Cedula" maxlength="10"  onkeypress="return solonumeroRUC(event)" onpaste="return false" required/>
        <label for="" class="F_label">Cedula o Pasaporte</label>
  </div>
  <div class="">
        <input type="text" placeholder="Nombres"  class="cajapeque" name="Nombres" onkeypress="return sololetras(event)" onpaste="return false" required/>
        <label for="" class="F_label">Nombres</label>
  </div>
  <div class="">
        <input type="text" placeholder="Apellidos"  class="cajapeque" name="Apellidos" onkeypress="return sololetras(event)" onpaste="return false" required/>
        <label for="" class="F_label">Apellidos</label>
  </div>
  <div class="">
        <input type="email" placeholder="Correo"  class="cajapeque" name="Correo" required/>
        <label for="" class="F_label"> Correo</label>
  </div>
  <select class="combo" name="carreA" required><option value="" >-CARRERA/ASPIRA-</option>
  <?php $consulta6=mysqli_query($con,"SELECT * from carreras where nombreC !='Facultad de ciencias agrarias'");
    while($row6=mysqli_fetch_array($consulta6)){
    echo "<option onclick='veri_ci()'>"; echo $row6['nombreC']; echo "</option>"; } ?> </select>
  <div class="">
        <input type="text" placeholder="Carrera/Proviene" class="cajapeque" name="CarreraProviene" onkeypress="return sololetras(event)" onpaste="return false" required/>
        <label for="" class="F_label">Carrera/Proviene</label>
  </div>
  <div class="">
        <input type="text" placeholder="Universidad/Proviene"  class="cajapeque" name="UniversidadProviene" onkeypress="return sololetras(event)" onpaste="return false" required/>
        <label for="" class="F_label">Carrera/Proviene</label>
  </div>
  <div class="">
        <input type="text" placeholder="Ultimo Año de Estudio" maxlength="4" class="cajapeque" name="utlti_ano" onkeypress="return solonumero(event)" onpaste="return false" required/>
        <label for="" class="F_label">Ultimo Año de Estudio</label>
  </div>
  <select class="combo" name="tipoU" required><option value="" >-TIPO-</option><option>PRIVADA</option><option>PUBLICA</option></select>
  <select class="combo" name="estado" required><option value="" >-ESTADO-</option><option>ACTIVO</option><option>INACTIVO</option></select>

  <input type="text" placeholder="codigo" id="9" class="cajapequec" name="codigoU" onkeypress="return enable(event)" onpaste="return false" required/>
  <select class="combo" onclick='ponerid()' name="NombreEmpleado" id="10" required><option value="" >-NOMBRE DE EMPLEADO-</option>
<?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_secre='on' and U.estado='ACTIVO'");
      while($row4=mysqli_fetch_array($consulta4)){
       echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select>

  <input type="submit" id="act" class="aceptar" value="Guardar"/>
  </form>
  <form action="ingreso_solicitante.php" method="post">
    <input class="btn_cerrar" type="submit" value="Cancelar" />
  </form>
</section>
</center>
<br/>
<script src="efecto_ingre_usu.js" charset="utf-8"></script>
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

      <th>FECHA</th>
      <th>Nº SOLICITUD</th>
      <th>CEDULA</th>
      <th>NOMBRE</th>
      <th>APELLIDO</th>
      <th>CORREO</th>
      <th>CARRERA/ASPIRA</th>
      <th>CARRERA/PROVIENE</th>
      <th>UNIVER./PROVIENE</th>
      <th>TIPO/UNIVER.</th>
      <th>ESTADO</th>
			<th>OPERACIONES</th>
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
        $consulta=mysqli_query($con,"SELECT * from solicitantes S inner join usuarios U on S.id_usuario=U.id_usuario where S.NumeroS like '%".$busqtipo."%' or S.Cedula like '%".$busqtipo."%' or S.Apellido like '%".$busqtipo."%' ORDER BY S.Apellido ASC");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['fechaS']; ?> </td>
              <td><?php echo $row['NumeroS']; ?> </td>
              <td><?php echo $row['Cedula']; ?> </td>
              <td><?php echo $row['Nombre']; ?> </td>
              <td><?php echo $row['Apellido']; ?> </td>
              <td><?php echo $row['correo']; ?> </td>
              <td><?php echo $row['CarreraA']; ?> </td>
              <td><?php echo $row['carreraP']; ?> </td>
              <td><?php echo $row['universiP']; ?> </td>
              <td><?php echo $row['tipoU']; ?> </td>
              <td><?php echo $row['estado']; ?> </td>
<td><a href="modificar_solicitante.php?id=<?php echo $row['id_solicitante'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true">CAMBIAR</i></a></td>

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
<script type="text/javascript">
function veri_ci() {
<?php
$consu=mysqli_query($con,"SELECT * from solicitantes");
while($row3=mysqli_fetch_array($consu)){
?>
  var ss =document.getElementById("ci").value;
  var Tci='<?php echo $row3['Cedula']; ?>'
  if (ss==Tci) {
    alert("Cedula de identidad ya Existente");
    document.getElementById("act").disabled = true;    
  }else {
    document.getElementById("act").disabled = false;
  }
<?php } ?>
}
</script>
