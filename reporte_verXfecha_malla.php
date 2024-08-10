<?php include('menu.php'); ?>
  <br>
<h3><i class="icono izquierda fa fa-clipboard" aria-hidden="true"></i> BUSQUEDA DE REPORTES</h3>
  <br>
  <p><h3>    _______________________________________________________________________________________________________________</h3></p>
  <br>

  <?php
  include('conexion.php');
?>

<center>
<section class="formulario_grande">
<p class="titulo_from">BUSCAR REPORTES DE MALLA POR FECHA</p>
  <form action="reporte_mallas.php" class="con_form" method="post">
    <select class="combo" name="NombreEmpleado" required><option value="" >-NOMBRE DE EMPLEADO-</option>
    <?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_profe_dele='on' and U.estado='ACTIVO'");
        while($row4=mysqli_fetch_array($consulta4)){
         echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select> <p> </p>
<p>Otra Busqueda: Por Semestre</p>
<input type="text" class="cajapeque" id="otraB" placeholder="Escribir"  name="otraB" /> <p> . </p>
<input type="submit" class="aceptar" value="Aceptar"/>
</form>
<form  action="vista_reportes.php?>" method="post">
  <input class="btn_cerrar" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br>
<br/>
<br/>

  </div>
</div>
</body>
</html>
