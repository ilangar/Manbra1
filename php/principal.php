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

    <a href="../html/piano.html" class="btnPiano">Piano</a>
    <a href="reconocer.php" class="btnReconocer">Reconocer</a>
    <a href="simon.php" class="btnSimon">Simon</a>

    
    <a href=""><img class="btnAjustes" src="../diseño/btnAjustes.png"></a>
    <a href=""><img class="btnPerfil" src="../diseño/btnPerfil.png"></a>

    <script>
        function abrirVentanaEmergente() {
            // Abre una ventana emergente
            window.open('../diseño/menuAjustes.png', '../diseño/menuAjustes.png', 'width=400,height=400');
        }
    </script>
</head>
<body>
    <a href="#" onclick="abrirVentanaEmergente();"><img class="btnAjustes" src="../diseño/btnAjustes.png"></a>


</body>
</html>
