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
    <a href="reconocer.php" class= btnReconocer></a>
    <a href="../html/simon.html" class="btnSimon"></a>
    <a href="musicograma.php" class="btnMusicograma"></a>

    <!-- Menú de perfil -->
    <div id="menuPerfil" class="menu" style="left: -100%;">
      <div class="menu-content">
        <div id="usuario">Nombre de Usuario</div>
        <button id="musicogramas">Musicogramas</button>
        <button id="cerrarSesion"></button>
      </div>
    </div>

    <a href="#" id="mostrarMenu">
      <img class="btnPerfil" src="../diseño/btnPerfil.png" alt="Botón Perfil">
    </a>
    <script>
      function cerrarSesion() {
        window.location.href = "../html/index.html";
      }

      window.onload = function() {
        document.getElementById("mostrarMenu").addEventListener("click", function() {
          var menuPerfil = document.getElementById("menuPerfil");
          if (menuPerfil.style.left === "-100%") {
            menuPerfil.style.left = "0";
          } else {
            menuPerfil.style.left = "-100%";
          }
        });

        // Agrega el evento para cerrar la sesión
        document.getElementById("cerrarSesion").addEventListener("click", cerrarSesion);
      };
    </script>
</body>
</html>
