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
<p class="titulo_from">BUSCAR REPORTES DE RESOLUCIÓN H. POR FECHA</p>
  <form action="reporte_RHomolo.php" class="con_form" method="post">
    <select class="combo" name="NombreEmpleado" required><option value="">-NOMBRE DE EMPLEADO-</option>
    <?php $consulta4=mysqli_query($con,"SELECT * from usuarios U inner join recursos R on U.id_usuario=R.id_usuario where R.recurso_secre_conse='on' and U.estado='ACTIVO'");
        while($row4=mysqli_fetch_array($consulta4)){
         echo "<option value='".$row4['id_usuario']."' onclick='ponerid()' >"; echo $row4['nombreU']." ";  echo $row4['apellidoU']; echo "</option>"; } ?> </select> <p> </p>
    <p>Fecha Desde</p><p>Fecha Hasta</p>
<input type="date" class="cajapeque" id="Xfechaini" name="Xfechaini" />
<input type="date" class="cajapeque" id="Xfechafin" name="Xfechafin" />
<p>Otra Busqueda: Por Nº Oficios, Apellido</p>
<input type="checkbox" class="cajapeque" id="che" onclick="otrabusqueda()"  name="che" />
<input type="text" class="cajapeque" id="otraB" placeholder="Escribir" disabled onclick="abc()"  name="otraB" />
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
<script type="text/javascript">
function otrabusqueda() {
var abc=document.getElementById("che").checked;
if (abc==true) {

    document.getElementById("otraB").disabled = false;
    document.getElementById("Xfechaini").disabled = true;
    document.getElementById("Xfechafin").disabled = true;
  }else {
    document.getElementById("otraB").disabled = true;
    document.getElementById("Xfechaini").disabled = false;
    document.getElementById("Xfechafin").disabled = false;
  }
}
</script>
