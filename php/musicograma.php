<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Centra horizontalmente el contenido */
            align-items: flex-end; /* Coloca el contenido en la parte inferior */
            height: 80vh; /* Altura del 80% del viewport height (altura de la ventana) */
        }

        .image {
            width: 100px;
            height: 100px;
            margin: 10px;
            cursor: grab;
        }

        body {
            margin: 0; /* Elimina los márgenes predeterminados del cuerpo de la página */
            display: flex;
            flex-direction: column;
            height: 100vh; /* Altura del 100% del viewport height (altura de la ventana) */
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Generador de Patrones de Imágenes</h1>
    
    <div class="image-container" id="pattern-container"></div>

    <script>
        const images = ["../diseño/hamburguesa.png","../diseño/platillos.png","../diseño/silencio.png", "../diseño/chasquido.png", "../diseño/aplauso.png", "../diseño/bongo.png", "../diseño/xilofono.png"]; // Rutas de las imágenes
        const patternContainer = document.getElementById('pattern-container');

        // Agrega las imágenes al contenedor
        images.forEach((imageSrc, index) => {
            const image = document.createElement('img');
            image.src = imageSrc;
            image.className = 'image';
            image.draggable = true;
            image.setAttribute('ondragstart', 'drag(event)');
            patternContainer.appendChild(image);
        });

        // Función para permitir el arrastre de las imágenes
        function drag(event) {
            event.dataTransfer.setData('image', event.target.src);
        }

        // Manejar el soltar de la imagen en el contenedor
        patternContainer.ondragover = (event) => event.preventDefault();

        patternContainer.ondrop = (event) => {
            event.preventDefault();
            const imageSrc = event.dataTransfer.getData('image');
            const image = document.createElement('img');
            image.src = imageSrc;
            image.className = 'image';
            image.draggable = true;
            image.setAttribute('ondragstart', 'drag(event)');
            patternContainer.appendChild(image);
        };
    </script>
</body>
</html>