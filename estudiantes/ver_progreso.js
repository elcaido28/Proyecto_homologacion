$(buscar_datos());
function buscar_datos(consulta) {
  $.ajax({
    url:'ver_progreso.php',
    type: 'POST',
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta) {
    $("#progreso").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  })
buscar_datos();
