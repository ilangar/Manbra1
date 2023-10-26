$(document).ready(function(){

$("#LogIn").click(function(){
    $.ajax({
       type:"POST",
       url:"../php/inicioSesion.php",
       datatype:"text",
       data: "usuario="+$("#usuario").val()+"&contrasena="+$("#contrasena").val()+"",
       success: function(devolucion){
            if(devolucion=='Usuario o contraseña incorrectos'){
                $("#mensaje").css("color","red");
                $("#mensaje").html(devolucion);
            }else{
                window.location.href = '../php/principal.php'
            }

       },
       error:function(error){
       }
    });
});

});