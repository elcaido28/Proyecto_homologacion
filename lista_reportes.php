<?php include('menu.php'); ?>
<div class="contenT2">
  <?php  if(!empty($_SESSION['TD']) || !empty($_SESSION['S'])){ ?>
  <section class="conten">
    <a href="reporte_verXfecha_solicitante1.php"><i class="fa fa-cubes" aria-hidden="true"></i> SOLICITUDES</a>
  </section>
  <section class="conten">
    <a href="reporte_verXfecha_solicitante2.php"><i class="fa fa-cubes" aria-hidden="true"></i>  SOLICITUDES FINALIZADAS</a>
  </section>  <?php } ?>
  <?php  if(!empty($_SESSION['TD']) || !empty($_SESSION['PD'])){ ?>
  <section class="conten">
    <a href="reporte_verXfecha_homologacion1.php"><i class="fa fa-clipboard" aria-hidden="true"></i>  HOMOLOGACIONES</a>
  </section>
  <section class="conten">
    <a href="reporte_verXfecha_homologacion2.php"><i class="fa fa-server" aria-hidden="true"></i>  MATERIAS HOMOLOGADAS</a>
  </section>
  <section class="conten">
    <a href="reporte_verXfecha_validacion.php"><i class="icono izquierda fa fa-black-tie" aria-hidden="true"></i> VALIDACION DE CONOCIMIENTO</a>
  </section>
  <section class="conten">
    <a href="reporte_verXfecha_malla.php"><i class="icono izquierda fa fa-black-tie" aria-hidden="true"></i>  MALLAS CURRICULARES</a>
  </section>
  <?php } ?>
  <?php  if(!empty($_SESSION['TD']) || !empty($_SESSION['SC'])){ ?>
  <section class="conten">
    <a href="reporte_verXfecha_resolucionh.php"><i class="icono izquierda fa fa-black-tie" aria-hidden="true"></i>  RESOLUCIONES DE HOMOLOGACIONES</a>
  </section>
  <section class="conten">
    <a href="reporte_verXfecha_resolucionv.php"><i class="icono izquierda fa fa-black-tie" aria-hidden="true"></i>  RESOLUCIONES DE VALIDACIONES</a>
  </section>
    <?php } ?>
</div>
</div>
</div>
</body>
</html>
