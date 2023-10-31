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
    <p id="contador-fallidos"><img src="../diseño/fallidos.png" width="75px"> <span class="karantina-font">0</span> </p>
    <p id="contador-acertados"><img src="../diseño/aciertos.png" width="75px"> <span class="karantina-font">0</span> </p>
    <a href="reset.php" class="btnReset"><img src="../diseño/restablecer.png" width="150px"></a>
  </div>
  
    <a href="../html/guitarraelectrica.html" class="guitarraelectrica"></a>
    <a href="../html/violin.html" class="violin"></a>
    <a href="../html/casa.html" class="btnCasa"> </a>
    <a href="principal.php">
      <img class="btnCasa" src="../diseño/btnCasa.png">
    </a>

  <div class="game-container"> 
    <a id="play-button"><img src="../diseño/iniciarSonido.png" width="200px"></a>
    <a id="reset-button"><img src="../diseño/pausa.png" width="200px"></a>
    <audio id="audio-player"></audio>
    <div id="instrumentos" class="options">
      <div id="resultado-div"></div>

      
    </div>
  </div>
  <script src="../js/jquery-3.3.1.js"></script>
  <script src="../js/script1.js"></script>
  
</body>

</html>
