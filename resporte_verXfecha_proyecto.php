<?php include('menu.php'); ?>
<h3><i class="icono izquierda fa fa-clipboard" aria-hidden="true"></i> BUSQUEDA DE REPORTES</h3>
  <br/>
  <p><h3>    _______________________________________________________________________________________________________________</h3></p>
  <br/>
  <br/>
  <?php
  include('conexion.php');
?>
<center>
<section class="formulario_grande">
<p class="titulo_from">BUSCAR REPORTES DE PROYECTOS POR FECHA</p>
  <form action="reporte_proyecto.php" class="con_form" method="post">
    <p>Fecha Desde</p><p>Fecha Hasta</p>
<input type="date" class="cajapeque" id="Xfechaini" name="Xfechaini" />
<input type="date" class="cajapeque" id="Xfechafin" name="Xfechafin" />
<p>Otra Busqueda: Por Estado, Codigo y Nombre/Proyecto</p>
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
<br/><br/>

  </div>
</div>
</body>
</html>
