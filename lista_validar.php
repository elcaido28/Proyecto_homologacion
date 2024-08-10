<?php
include('menu.php');
/*include('conexion.php');*/
?>
<br/>

<h3><i class="fa fa-drivers-license-o"></i> LISTADO DE SOLICITANTES A VALIDAR CONOCIMIENTO</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
<br/><br/>
<br/>
<section class="busqueda">
  <form  method="post">
  <input type="text" name="busqtipo" value="" />
  <input type="submit"  value="Buscar"  />
  </form>
</section>
<br/>
<?php  $carre=$_SESSION['CA']; ?>
<table class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>

      <th>FECHA</th>
      <th>Nº SOLICITUD</th>
      <th>CEDULA</th>
      <th>NOMBRE</th>
      <th>APELLIDO</th>
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
          $fechaactual = date('Y-m-d'); // 2016-12-29
          $nuevafecha = strtotime ('-6 year' , strtotime($fechaactual)); //Se añade un año mas
          $nuevafecha = date ('Y',$nuevafecha);
        
        include('conexion.php');
        $consulta=mysqli_query($con,"SELECT * from solicitantes S inner join usuarios U on S.id_usuario=U.id_usuario where S.Cedula like '%".$busqtipo."%' and S.ult_ano <= '$nuevafecha' and S.CarreraA='$carre' or S.Apellido like '%".$busqtipo."%' and S.ult_ano <= '$nuevafecha' and S.CarreraA='$carre' ORDER BY S.Apellido ASC");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['fechaS']; ?> </td>
              <td><?php echo $row['NumeroS']; ?> </td>
              <td><?php echo $row['Cedula']; ?> </td>
              <td><?php echo $row['Nombre']; ?> </td>
              <td><?php echo $row['Apellido']; ?> </td>
              <td><?php echo $row['CarreraA']; ?> </td>
              <td><?php echo $row['carreraP']; ?> </td>
              <td><?php echo $row['universiP']; ?> </td>
              <td><?php echo $row['tipoU']; ?> </td>
              <td><?php echo $row['estado']; ?> </td>
<td><a href="ingreso_validacion.php?id=<?php echo $row['id_solicitante'];?>" class="establecer"><i class="fa fa-pencil-square-o" aria-hidden="true">VALIDAR C.</i></a></td>

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
