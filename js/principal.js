document.addEventListener("DOMContentLoaded", function () {
    const btnAbrirVentana = document.getElementById("btnAjustes");
  
    btnAbrirVentana.addEventListener("click", function () {
      // Abre una nueva ventana o pestaña del navegador
      window.open('../diseño/FondoReconocer.png', "menuAjustes.png", "opciones");
    });
  });
  
  