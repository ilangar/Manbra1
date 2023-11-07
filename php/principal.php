<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botones Interactivos</title>
    <link rel="stylesheet" href="../css/principal.css">
    <link rel="stylesheet" href="../js/principal.js">

</head>
<body class="fondo1">

    <a href="../html/piano.html" class="btnPiano"></a>
    <a href="reconocer.php" class="btnReconocer"></a>
    <a href="../html/simon.html" class="btnSimon"></a>
    <a href="musicograma.php" class="btnMusicograma"></a>


    
    <div class="menu" id="menu">
  <img src="../diseño/registroventana.png" alt="Contenido del Menú">
</div>
<a href="#" id="mostrarMenu">
  <img class="btnPerfil" src="../diseño/btnPerfil.png" alt="Botón Perfil">
</a>
<script>
  window.onload = function() {
    document.getElementById("mostrarMenu").addEventListener("click", function() {
      var menu = document.getElementById("menu");
      if (menu.style.left === "-100%") {
        menu.style.left = "0";
      } else {
        menu.style.left = "-100%";
      }
    });
  };
</script>

</html>
