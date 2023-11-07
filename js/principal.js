document.addEventListener("DOMContentLoaded", function () {
  const btnAbrirVentana = document.getElementById("btnAjustes");

  btnAbrirVentana.addEventListener("click", function () {
    // Abre una nueva ventana o pestaña del navegador
    window.open('../diseño/FondoReconocer.png', "menuAjustes.png", "opciones");
  });

  // Agrega el evento para mostrar/ocultar el menú de perfil
  document.getElementById("mostrarMenu").addEventListener("click", function () {
    var menuPerfil = document.getElementById("menuPerfil");
    if (menuPerfil.style.left === "-100%") {
      menuPerfil.style.left = "0";
    } else {
      menuPerfil.style.left = "-100%";
    }
  });

  // Agrega el evento para cerrar la sesión
  document.getElementById("cerrarSesion").addEventListener("click", function () {
    // Redirige a la página de cierre de sesión
    window.location.href = "cerrar-sesion.php";
  });
});
