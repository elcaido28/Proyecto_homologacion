<?php
include('menu.php');
include('conexion.php');
  $idv=$_REQUEST['id'];
?>
<br/>

<h3><i class="fa fa-cubes" aria-hidden="true"></i>ASIGNACION DE AÑO A ESTUDIAR</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
<table class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>
      <th>AÑO</th>
      <th>EDITAR</th>
			</tr>
      </thead>
      <tr>
        <?php
        $consulta3=mysqli_query($con,"SELECT * from anohomolo A inner join homologaciones H on A.id_homologacion=H.id_homologacion where H.id_homologacion='$idv' ");
         while($row=mysqli_fetch_array($consulta3)){        ?>
          <td><?php echo $row['anohomo']; ?> </td>
    			<td><a href="modificar_anohomo.php?id=<?php echo $row['id_anohomolo'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"> CAMBIAR</i></a>
  </tr>
        <?php
        			}
        ?>
</table>
<br/>
  </div>
</div>
</body>
</html>
