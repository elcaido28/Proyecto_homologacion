$(document).ready(function(){
  fromSubmint()
})
function fromSubmint(){

$('#formDatos').submit(function(e) {
  e.preventDefault()
  var text=localStorage.getItem('s_id')
  var b = "#b"+text
  var c = "#c"+text
  var cod = $('#Codigo').val()
  var codm = $('#CodigoM').val()
  var codh = $('#CodigoH').val()
  var nota = $(b).val()
  var hora = $(c).val()
  var data1 = 'cod='+cod+'&nota='+nota+'&hora='+hora+'&codm='+codm+'&codh='+codh;
  $.ajax({
    url: 'guardar_homologa2.php',
    type: 'POST',
    data: data1,
    beforeSend: function(){
      console.log('Enviando Datos A La Base/Datos...')
    },
    success:function (resp) {
      console.log('resp')
     }
   })
 })
}
