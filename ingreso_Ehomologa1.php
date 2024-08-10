<?php
include('menu.php');
include('conexion.php');
  $idv=$_REQUEST['id'];
?>
<br/>

<h3><i class="fa fa-cubes" aria-hidden="true"></i>REVISIÓN DE HOMOLOGACIONES Y REVISION DE MALLAS</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>

<center>
<section class="formulario1">
<p class="titulo_from">ESTABLECER REVISIÓN</p>
  <form action="modificarPro2_homologa1.php?id=<?php echo $idv; ?>" class="con_form" method="post">
  <select class="combo2" name="estado2" required><option value="">-ESTADO-</option><option>PENDIENTE</option><option>FINALIZADA</option>
  <input type="submit" class="aceptar2" value="Aceptar"/>
  </form>
<form  action="lista_homologaciones.php" method="post">
  <input class="btn_cerrar2" type="submit" value="Cancelar"/>
</form>
</section>
</center>
<br><br>
<br/><br/><br/>

  </div>
</div>
</body>
</html>
