<?php
include('menu.php');
include('conexion.php');
?>
  <br>
<h3><i class="fa fa-drivers-license-o"></i> LISTADO DE HOMOLOGACIONES Y Y VALIDACIONES DE CONOCIMIENTO FINALIZADAS</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
<center>
<h3>HOMOLOGACIONES FINALIZADAS</h3><br>
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
      <th>ESTADO H.</th>
      <th>ESTADO R.</th>
      <th>REVISAR</th>
			<th>EDITAR</th>
			</tr>
      </thead>
      <tr>
        <?php
        if(empty($_POST['busqtipo'])){
              $busqtipo="";

         }else {
            $busqtipo=$_POST['busqtipo'];
          }
        $consulta=mysqli_query($con,"SELECT * from solicitantes S inner join homologaciones H on S.id_solicitante=H.id_solicitante inner join usuarios U on S.id_usuario=U.id_usuario
         where S.NumeroS like '%".$busqtipo."%' and estado1='Finalizada' or S.Cedula like '%".$busqtipo."%' and estado1='Finalizada' or S.Apellido like '%".$busqtipo."%' and estado1='Finalizada' ORDER BY S.Apellido ASC ");
         while($row=mysqli_fetch_array($consulta)){
        ?>
              <td><?php echo $row['NumeroS']; ?> </td>
              <td><?php echo $row['Nombre']." ".$row['Apellido']; ?> </td>
              <td><?php echo $row['fechaH']; ?> </td>
              <td><?php echo $row['numero_ofi']; ?> </td>
              <td><?php echo $row['observacion']; ?> </td>
              <td><?php echo $row['estado1']; ?> </td>
              <td><?php echo $row['estado2']; ?> </td>
              <td><a href="ingreso_Ehomologa1.php?id=<?php echo $row['id_homologacion'];?>" class="establecer"><i class="fa fa-stack-exchange" aria-hidden="true"> ESTABLECER</i></a></td>
              <td><a href="ingreso_Ehomologa1.php?id=<?php echo $row['id_homologacion'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"> CAMBIAR</i></a></td>
  </tr>
        <?php
        			}
        ?>
</table>
<br/><br/>
<center>
<h3>VALIDACIONES DE CONOCIMIENTO FINALIZADAS</h3><br>
</center>
<br>
<section class="busqueda">
  <form  method="post">
  <input type="text" name="busqtipo2" value="" />
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
      <th>NUMERO DE VALIDACION</th>
      <th>ESTADO V.</th>
      <th>ESTADO R.</th>
      <th>REVISAR</th>
			<th>EDITAR / BORRAR</th>
			</tr>
      </thead>
      <tr>
        <?php
        if(empty($_POST['busqtipo2'])){
              $busqtipo2="";

         }else {
            $busqtipo2=$_POST['busqtipo2'];
          }
        $consulta=mysqli_query($con,"SELECT * from validaciones V inner join solicitantes S on V.id_solicitante=S.id_solicitante where S.NumeroS like '%".$busqtipo2."%' and estadoV='Finalizada' or V.estadoR like '%".$busqtipo2."%' and estadoV='Finalizada' or S.Apellido like '%".$busqtipo2."%' and estadoV='Finalizada' ORDER BY S.Apellido ASC ");
         while($row=mysqli_fetch_array($consulta)){
        ?>
        <td><?php echo $row['NumeroS']; ?> </td>
        <td><?php echo $row['Nombre']." ".$row['Apellido']; ?> </td>
        <td><?php echo $row['fechaV']; ?> </td>
        <td><?php echo $row['numeroV']; ?> </td>
        <td><?php echo $row['estadoV']; ?> </td>
        <td><?php echo $row['estadoR']; ?> </td>
        <td><a href="ingreso_Ehomologa1v.php?id=<?php echo $row['id_validacion'];?>" class="establecer"><i class="fa fa-stack-exchange" aria-hidden="true"> ESTABLECER</i></a></td>
        <td><a href="ingreso_Ehomologa1v.php?id=<?php echo $row['id_validacion'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"> CAMBIAR</i></a></td>
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
