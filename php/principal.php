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

    <div class="menu" id="menu" style="left: -100%;"> <!-- Agrega style="left: -100%;" -->
      <img src="../diseño/registroventana.png" alt="Contenido del Menú">
      
      <a href="tu-pagina-de-login.html" class="menu-button" id="menuButton" style="display: none;"> <!-- Agrega style="display: none;" -->
        <img src="../diseño/btnLogIn.png" alt="Botón Login">
      </a>
      <img src="../diseño/NOMBRE DE USUARIO.png" alt="Nombre de Usuario" class="menu-image" id="menuImage" style="display: none;"> <!-- Agrega style="display: none;" -->
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
            
            // Muestra el botón e imagen cuando el menú se abre
            document.getElementById("menuButton").style.display = "block";
            document.getElementById("menuImage").style.display = "block";
          } else {
            menu.style.left = "-100%";
            
            // Oculta el botón e imagen cuando el menú se cierra
            document.getElementById("menuButton").style.display = "none";
            document.getElementById("menuImage").style.display = "none";
          }
        });
      };
    </script>
</body>
</html>
