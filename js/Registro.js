$(document).ready(function(){

$("#reg").click(function(){
    
    $.ajax({
       type:"POST",
       url:"../php/registro.php",
       datatype:"text",
       data:"nombre="+$("#nombre").val()+"&apellido="+$("#apellido").val()+"&usuario="+$("#usuario").val()+"&contrasena="+$("#contrasena").val()+"",
       success: function(devolucion){
            if(devolucion=="registrado"){
                window.location.href = '../html/inicioSesion.html';
            }else{
                $("#mensaje").css("color","red");
                $("#mensaje").html(devolucion);
            }

       },
       error:function(error){

       }
    });
});


});