<?php
include('menu.php');
include('conexion.php');
if (isset($_REQUEST['id'])) {
  $_SESSION['idv']=$_REQUEST['id'];}
  $idv=$_SESSION['idv'];
  ?>
  <br/>
  <script src="guardar_homologa2.js"></script>
<h3><i class="fa fa-list-alt"></i> REGISTRO DE HOMOLOGACION</h3>
  <br/>
  <p><h3>    ____________________________________________________________________</h3></p>
  <br/>
<?php
$consulta2=mysqli_query($con,"SELECT id_malla_homo from malla_homolo Order by id_malla_homo ASC");
while($row2=mysqli_fetch_array($consulta2)){
  $addID=$row2['id_malla_homo'];
  $addID+=+1;
}  ?>
<select class="combo" onclick="selec_info()" name="tipoU" id="info"><option>-GENERAR INFORME-</option><option onclick="selec_info()">HOMOLOGACION</option><option onclick="selec_info()">REVISION MALLA/NO PROCEDE</option><option onclick="selec_info()">REVISION MALLA/OTRA IES</option><option onclick="selec_info()">REVISION MALLA/PRE</option><option onclick="selec_info()">ALCANCE</option></select>
<script type="text/javascript">
function selec_info() {
  var inf=document.getElementById('info').value;
if (inf=="HOMOLOGACION") {
   window.location.href='http://localhost/homologacion/informe_homologacion.php?id='+'<?php echo $idv; ?>';
}
if (inf=="REVISION MALLA/NO PROCEDE") {
   window.location.href='http://localhost/homologacion/informe_Rmalla1.php?id='+'<?php echo $idv; ?>';
}
if (inf=="REVISION MALLA/OTRA IES") {
   window.location.href='http://localhost/homologacion/informe_Rmalla2.php?id='+'<?php echo $idv; ?>';
}
if (inf=="REVISION MALLA/PRE") {
   window.location.href='http://localhost/homologacion/informe_Rmalla3.php?id='+'<?php echo $idv; ?>';
}
if (inf=="ALCANCE") {
   window.location.href='http://localhost/homologacion/informe_alcance.php?id='+'<?php echo $idv; ?>';
}
 }
</script>



<center>
  <?php
  if (isset($_REQUEST['consul'])) {
      $gggg=$_REQUEST['consul'];
  }else{
     $gggg="";
  } ?>


  <section class="busqueda">
    <form  method="post">
    <input type="text" name="busqtipo" placeholder="Buscar Materia a Homologar" value="" />
    <input type="submit"  value="Buscar"  />
    </form>
  </section>
  <br>
<section class="formulario_grande">
<p class="titulo_from">SELECCION DE MATERIAS</p>
  <form id="formDatos" class="con_form" method="post">
<?php  $carre=$_SESSION['CA']; ?>
  <select class="combo" name="semestre" id="cons"><option>-SEMESTRE-</option>
<?php  $consulta4=mysqli_query($con,"SELECT * from semestre S inner join carreras C on S.id_carrera=C.id_carrera where C.nombreC='$carre'");
      while($row4=mysqli_fetch_array($consulta4)){
       echo "<option class='selectorO' value='".$row4['nombreSM']."'>"; echo $row4['nombreSM']; echo "</option>"; } ?> </select>

  <table class="tabla" border="2"  bordercolor="#336666" >
  		<thead>
  			<tr>
        <th>SELECT</th>
        <th>MATERIA</th>
  			<th>CALIFICACION</th>
        <th>HORAS</th>
        <th>OPERACIONES</th>
  			</tr>
        </thead>
        <tr>

          <?php
          $consulano=mysqli_query($con,"SELECT Periodo from mallas order by Periodo ASC ");
           while($rowano=mysqli_fetch_array($consulano)){
              $anoP=$rowano['Periodo'];
           }


          if(empty($_POST['busqtipo'])){
                $busqtipo="";

           }else {
              $busqtipo=$_POST['busqtipo'];
            }
          $ia=0;
          include('conexion.php');
          $k=0;
          $num_consul=mysqli_num_rows(mysqli_query($con,"SELECT * from malla_homolo MH inner join homologaciones H on MH.id_homologacion=H.id_homologacion where H.id_homologacion='$idv'"));
          $consulta8=mysqli_query($con,"SELECT MH.id_malla from malla_homolo MH inner join homologaciones H on MH.id_homologacion=H.id_homologacion where H.id_homologacion='$idv'");
           while($row8=mysqli_fetch_array($consulta8)){
             $k+=+1;
             $arrayID[$k]=$row8['id_malla'];
           }
          $consulta=mysqli_query($con,"SELECT * from  mallas M inner join carreras C on M.id_carrera=C.id_carrera where M.Materia like '%".$busqtipo."%' and M.semestre='$gggg' and C.nombreC='$carre' and M.Periodo='$anoP' ORDER BY M.Materia ASC");
           while($row=mysqli_fetch_array($consulta)){
              $vacum=0;
             for ($i=1; $i<=$num_consul; $i++) {
               if ($arrayID[$i]==$row['id_malla']) {
                 $vacum=1;
               }
             }
             if ($vacum==1) {
               $vacum=0;
             }else {
               $vacum=0;
             $ia+=+1;
          ?>

          <td><input type="checkbox" class="aaaa" name="Codigo" id="<?php echo $ia;?>" /></td>
          <td><textarea  disabled id="<?php echo "a".$ia;?>" class="cajadescripT" name="<?php echo "Materia".$ia;?>" placeholder="<?php echo $row['id_malla']; ?>" onkeypress="return enable(event)" onpaste="return false" required/><?php echo $row['Materia']; ?></textarea></td>
          <td><input type="text" autofocus disabled id="<?php echo "b".$ia;?>" class="cajapequeT"  placeholder="Calificacion" name="<?php echo "Calificacion".$ia;?>" onkeypress="return solonumero(event)" onpaste="return false" required/></td>
          <td><input type="text" disabled id="<?php echo "c".$ia;?>" class="cajapequeT" placeholder="Horas" name="<?php echo "Horas".$ia;?>" onkeypress="return solonumero(event)" onpaste="return false" required/></td>
          <td><input type="submit" disabled id="<?php echo "d".$ia;?>" class="aceptarT" value="AGREGAR"/></td>
        </tr>
        <?php
      }  }

        ?>
  </table>
<input type="text" class="cajapequec" placeholder="Codigo Malla"  onkeypress="return enable(event)" onpaste="return false" id="CodigoM" name="CodigoM" required/>
<input type="text" class="cajapequec" placeholder="Codigo Homologacion" value="<?php echo $idv;?>" onkeypress="return enable(event)" onpaste="return false" id="CodigoH" name="CodigoH" required/>
  </form>
 <a href="guardar_anohomo.php?id=<?php echo $idv; ?>" class="establecer2"><i>ASIGNAR AÑO</i></a> <br><br>

<script type="text/javascript">

$('.aaaa').click(function(e){

 var tex= e.target.id;
 localStorage.setItem("s_id",tex);
var abc=document.getElementById(localStorage.getItem('s_id')).checked;
var a="a"+tex;
var b="b"+tex;
var c="c"+tex;
var d="d"+tex;

if (abc==true) {
    document.getElementById(a).disabled = false;
    var ddd=document.getElementById(a).placeholder;
    document.getElementById('CodigoM').value=ddd;
    document.getElementById(b).disabled = false;
    document.getElementById(c).disabled = false;
    document.getElementById(d).disabled = false;
  }else {
    document.getElementById(a).disabled = true;
    document.getElementById(b).disabled = true;
    document.getElementById(c).disabled = true;
    document.getElementById(d).disabled = true;
  }
})

</script>
</section>
</center>
<br>
<br>
<table class="tabla" border="2"  bordercolor="#336666" >
		<thead>
			<tr>
      <th>SEMESTRE</th>
      <th>MATERIA</th>
			<th>NOTA</th>
      <th>HORAS</th>
      <th>EDITAR</th>
			</tr>
      </thead>
      <tr>
        <?php
        $consulta3=mysqli_query($con,"SELECT * from malla_homolo MH inner join homologaciones H on MH.id_homologacion=H.id_homologacion inner join mallas M on M.id_malla=MH.id_malla where H.id_homologacion='$idv' ORDER BY M.semestre ASC ");
         while($row=mysqli_fetch_array($consulta3)){
        ?>

              <td><?php echo $row['semestre']; ?> </td>
              <td><?php echo $row['Materia']; ?> </td>
              <td><?php echo $row['calificacion']; ?> </td>
              <td><?php echo $row['horas']; ?> </td>
        			<td><a href="modificar_homologa2.php?id=<?php echo $row['id_malla_homo'];?>" class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"> CAMBIAR</i></a>
  </tr>
        <?php
        			}
        ?>
</table>
<br/><br/><br/><br/><br/>

  </div>
</div>
<script type="text/javascript">
document.getElementById('cons').value=localStorage.getItem('seme2');
localStorage.setItem('seme2',"-SEMESTRE-");
</script>
</body>
</html>
<script type="text/javascript">
$('.selectorO').click(function(e){
 var seme= e.target.value;
 localStorage.setItem("seme2",seme);
 window.location.href='http://localhost/homologacion/ingreso_homologa2.php?consul='+localStorage.getItem('seme2');
})
</script>
