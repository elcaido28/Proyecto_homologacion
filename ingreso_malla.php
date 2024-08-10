<?php
include('menu.php');
include('conexion.php');
?>
  <br>

<h3><i class="fa fa-sitemap"></i> REGISTRO DE MALLA CURRICULAR</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
  <?php  $carre=$_SESSION['CA']; ?>
<?php
$consulta2=mysqli_query($con,"SELECT id_malla from mallas Order by id_malla ASC");
while($row2=mysqli_fetch_array($consulta2)){
  $addID=$row2['id_malla'];
  $addID+=+1;
} ?>
<center>
<section class="formulario1">
<p class="titulo_from">NUEVA MALLA CURRICULAR</p>
  <form action="guardar_malla.php" class="con_form" method="post">
  <input type="number" class="cajapeque2" placeholder="Codigo" value="<?php echo $addID; ?>" onkeypress="return enable(event)" onpaste="return false" name="Codigo" required/>
  <input type="text" class="cajapeque2" placeholder="Periodo: 2017-2018" autofocus name="Periodo" required/>
    <select class="combo2" name="semestre" id="cons"><option>-SEMESTRE-</option>
  <?php  $consulta4=mysqli_query($con,"SELECT * from semestre S inner join carreras C on S.id_carrera=C.id_carrera where C.nombreC='$carre'");
        while($row4=mysqli_fetch_array($consulta4)){
         echo "<option>"; echo $row4['nombreSM']; echo "</option>"; } ?> </select>
  <input type="text" class="cajapeque2" placeholder="Materia" onkeypress="return sololetras(event)" onpaste="return false"  name="Materia" required/>
  <input type="text" class="cajapeque2" placeholder="Horas"  name="Horas" onkeypress="return solonumero(event)" onpaste="return false" required/>
  <input type="submit" class="aceptar2" value="Aceptar"/>
  </form>
<form  action="ingreso_malla.php" method="post">
  <input class="btn_cerrar2" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br><br>
<section class="busqueda">
  <form  method="post">
  <input type="text" name="busqtipo" value="" />
  <input type="submit"  value="Buscar"  />
  </form>
</section>
<br>
<br/>
<table  class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>
      <th>PERIODO</th>
      <th>SEMESTRE</th>
			<th>MATERIA</th>
      <th>HORAS</th>
			<th>EDITAR / BORRAR</th>
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
        $consulta=mysqli_query($con,"SELECT * from mallas M inner join carreras C on C.id_carrera=M.id_carrera where M.semestre like '%".$busqtipo."%' and C.nombreC='$carre' or M.Periodo like '%".$busqtipo."%' and C.nombreC='$carre'");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['Periodo']; ?> </td>
              <td><?php echo $row['semestre']; ?> </td>
              <td><?php echo $row['Materia']; ?> </td>
              <td><?php echo $row['horas']; ?> </td>
        			<td><a href="modificar_malla.php?id=<?php echo $row['id_malla'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"> CAMBIAR</i></a></td>
  </tr>
        <?php
        			}
        ?>
</table>
<br/><br/><br/>

  </div>
</div>
</body>
</html>
