<?php
include('menu.php');
include('conexion.php');
?>
  <br>

<h3><i class="fa fa-sitemap"></i>REGISTRO DE MALLA CURRICULAR</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
  <?php  $carre=$_SESSION['CA']; ?>
  <?php
  $idv=$_REQUEST['id'];
  $result= mysqli_query($con,"SELECT * from mallas where id_malla='$idv'");
  $row= mysqli_fetch_assoc($result);
   ?>
<center>
<section class="formulario1">
<p class="titulo_from">MODIFICAR MALLA CURRICULAR</p>
  <form action="modificarPro_malla.php" class="con_form" method="post">
  <input type="number" class="cajapeque2" placeholder="Codigo" value="<?php echo $row['id_malla'];?>" onkeypress="return enable(event)" onpaste="return false" name="Codigo" required/>
  <input type="text" class="cajapeque2" placeholder="Periodo: 2017-2018" autofocus value="<?php echo $row['Periodo'];?>" name="Periodo" required/>
    <select class="combo2" name="semestre" id="cons"><option><?php echo $row['semestre'];?></option>
  <?php  $consulta4=mysqli_query($con,"SELECT * from semestre S inner join carreras C on S.id_carrera=C.id_carrera where C.nombreC='$carre'");
        while($row4=mysqli_fetch_array($consulta4)){
         echo "<option>"; echo $row4['nombreSM']; echo "</option>"; } ?> </select>
  <input type="text" class="cajapeque2" placeholder="Materia" onkeypress="return sololetras(event)" value="<?php echo $row['Materia'];?>" onpaste="return false"  name="Materia" required/>
  <input type="text" class="cajapeque2" placeholder="Horas"  name="Horas" onkeypress="return solonumero(event)" value="<?php echo $row['horas'];?>" onpaste="return false" required/>
  <input type="submit" class="aceptar2" value="Modificar"/>
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

  </div>
</div>
</body>
</html>
