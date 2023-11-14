<?php
session_start();
$_ENV = parse_ini_file("../.env");
$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "../cacert.pem", NULL, NULL);
$mysqli->real_connect($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);

$sql = "SELECT idUser FROM usuarios WHERE usuario";
$idUser = $_SESSION['IDUsuario'];

if (!isset($_SESSION['IDUsuario'])) 
{
  header("Location: ../html/inicioSesion.html");
  exit();
}

// Consulta para obtener el nombre del usuario
$sqlNombre = "SELECT usuario FROM Usuarios WHERE idUser = '$idUser'";
$result = $mysqli->query($sqlNombre);

if ($result->num_rows > 0) 
{
  $row = $result->fetch_assoc();
  $nombreUsuario = $row['usuario'];
}
else 
{
  $nombreUsuario = "Nombre de Usuario";
}
$mysqli->close();
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
    <a href="reconocer.php" class= btnReconocer></a>
    <a href="../html/simon.html" class="btnSimon"></a>
    <a href="musicograma.php" class="btnMusicograma"></a>

    <!-- Menú de perfil -->
    <div id="menuPerfil" class="menu" style="left: -100%;">
      <div class="menu-content">
        <div id="usuario"><?php echo  $nombreUsuario; ?></div>
        <button id="musicogramas">Musicogramas</button>
        <button id="cerrarSesion"></button>
      </div>
    </div>

    <a href="#" id="mostrarMenu">
      <img class="btnPerfil" src="../diseño/btnAjustes.png" alt="Botón Perfil">
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