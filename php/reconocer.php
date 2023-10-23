<?php
session_start();
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
