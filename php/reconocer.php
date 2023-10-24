<?php
session_start();
$_ENV = parse_ini_file("../.env");
$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "../cacert.pem", NULL, NULL);
$mysqli->real_connect($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);

if ($mysqli->connect_error)  
{
    die("Conexión fallida: " . $mysqli->connect_error);
}

$sql = "SELECT idUser FROM usuarios";

$idUser = $sql->insert_id;
$resultadoDelJuego = 'fallado';

if ($resultadoDelJuego === 'fallado') 
{
  $sql = "UPDATE perfil SET intentosFallidos = intentosFallidos + 1 WHERE idUser = $idUser";
} 
else 
{
  $sql = "UPDATE perfil SET intentosAcertados = intentosAcertados + 1 WHERE idUser = $idUser";
}

if ($mysqli->query($sql) === TRUE) 
{
  $mensaje = "Registro de intentos actualizado con éxito";
  echo $mensajeExito;
} 
else 
{
  $mensajeError = "Error al actualizar el registro de intentos";
  echo $mensajeError . $mysqli->error;
}

$mysqli->close();

?>
<!DOCTYPE html>

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adivina el Instrumento</title>
  <link rel="stylesheet" href="../css/reconocer.css">
</head>
<body>
  <body class="fondo2">
  
  <div class="contador">
    <p id="contador-fallidos">Fallidos: 0</p>
    <p id="contador-acertados">Acertados: 0</p>
  </div>
  
    <a href="guitarraelectrica.html" class="guitarraelectrica"></a>
    <a href="violin.html" class="violin"></a>
    <a href="casa.html" class="btnCasa"></a>
    <a href="javascript:history.back()">
      <img class="btnCasa" src="../diseño/btnCasa.png">
    </a>
    




  <div class="game-container"> 
    <button id="play-button">Iniciar sonido</button>
    <button id="reset-button">Reiniciar</button>
    <audio id="audio-player"></audio>
    <div id="instrumentos" class="options">
      <div id="resultado-div"></div>

      
    </div>
  </div>
  <script src="../js/jquery-3.3.1.js"></script>
  <script src="../js/script1.js"></script>
  
</body>

</html>
