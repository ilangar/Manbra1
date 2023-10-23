<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simón dice</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap" rel="stylesheet">
    <link href="../css/simon.css" rel="stylesheet" />
    <script src="../js/simon.js" type="text/javascript" defer></script>
</head>
<body>
    <body class="fondo3"></body>
    <div class="simon">
        <div class="title">Simon</div>
        <button id="startButton">Start</button>
        <div class="buttonContainer">
            <div class="square red"></div>
            <div class="square yellow"></div>
            <div class="square blue"></div>
            <div class="square green"></div>
        </div>
        <div id="round"></div>
    </div>
</body>
</html>