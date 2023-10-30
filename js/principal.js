document.addEventListener("DOMContentLoaded", function () {
    const btnAbrirVentana = document.getElementById("btnAjustes");
  
    btnAbrirVentana.addEventListener("click", function () {
      // Abre una nueva ventana o pestaña del navegador
      window.open('../diseño/FondoReconocer.png', "menuAjustes.png", "opciones");
    });
  });
  
  document.getElementById("mostrarMenu").addEventListener("click", function() {
    var menu = document.getElementById("menu");
    if (menu.style.left === "-100%") {
      menu.style.left = "0";
    } else {
      menu.style.left = "-100%";
    }
  });
  
  