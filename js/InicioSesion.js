$(document).ready(function(){

$("#reg").click(function(){
    
    $.ajax({
       type:"POST",
       url:"../php/inicioSesion.php",
       datatype:"text",
       data: "&usuario="+$("#usuario").val()+"&contrasena="+$("#contrasena").val()+"",
       success: function(devolucion){
            if(devolucion== $mensajeAviso){
                $("#mensaje").css("color","red");
                $("#mensaje").html(devolucion);
            }

       },
       error:function(error){
       }
    });
});


});