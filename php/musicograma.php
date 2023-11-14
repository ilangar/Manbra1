<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../css/musicograma.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <title>Creador de Musicogramas</title>
</head>
<body>

<a href="casa.html" class="btnCasa"></a>
<a href="../php/principal.php">
    <img class="btnCasa" src="../diseño/btnCasa.png">
</a>


    <div class="image-container" id="image-container">
        <!-- espacio vacío para las imágenes -->
    </div>
    
    <div class="image-drop-container" id="image-drop-container"></div>
    
    <div class="button-container">
        <button id="resetButton"></button>
        <button id="Guardar"></button>
        <label id="mensaje"></label><br><span class="karantina-font"></span>
    </div>

    <?php include('guardarPatron.php'); ?>

    <script src="../js/musicograma.js"></script>
</body>
</html>
