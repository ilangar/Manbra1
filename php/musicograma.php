<?php
session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/musicograma.css">

<head>
    <style>
        body {
            background-image: url('../diseño/fondomusicograma.png');
            background-size: cover;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Centra horizontalmente el contenido */
            align-items: flex-end; /* Coloca el contenido en la parte inferior */
            height: 70vh; /* Altura del 70% del viewport height (altura de la ventana) */
            background-color: rgba(255, 255, 255, 0);
        }

        .image {
            width: 150px;
            height: 150px;
            margin: 10px;
            cursor: grab;
            margin-bottom: 120px; /* Ajusta el margen inferior para posicionar las imágenes más arriba */
        }

        body {
            margin: 0; /* Elimina los márgenes predeterminados del cuerpo de la página */
            display: flex;
            flex-direction: column;
            height: 93vh; /* Altura del 100% del viewport height (altura de la ventana) */
        }

        h1 {
            text-align: center;
        }

        .image-drop-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Centra horizontalmente el contenido */
            align-items: flex-start; /* Coloca el contenido en la parte superior */
            height: 20vh; /* Altura del 20% del viewport height (altura de la ventana) */
        }

        .image-drop-container .image {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<a href="casa.html" class="btnCasa"></a>
      <a href="../php/principal.php">
      <img class="btnCasa" src="../diseño/btnCasa.png"></button>
      </a>
<body>
    
    
    <div class="image-container" id="image-container">
        <!-- Deja este espacio vacío para las imágenes iniciales -->
    </div>
    
    <div class="image-drop-container" id="image-drop-container"></div>

    <button id="resetButton">Reiniciar</button>
    <button id="Guardar">Guardar</button>



    <script>
        const images = [ "../diseño/silencio.png", "../diseño/chasquido.png", "../diseño/aplauso.png", "../diseño/zapateo.png", "../diseño/golpeo.png"]; // Rutas de las imágenes
        const imageContainer = document.getElementById('image-container');
        const imageDropContainer = document.getElementById('image-drop-container');
        const maxImages = 6; // Número máximo de imágenes en el contenedor de abajo

        // Agrega las imágenes iniciales al contenedor superior
        images.forEach((imageSrc, index) => {
            const image = createImageElement(imageSrc);
            imageContainer.appendChild(image);
        });

        // Función para crear un elemento de imagen
        function createImageElement(imageSrc) {
            const image = document.createElement('img');
            image.src = imageSrc;
            image.className = 'image';
            image.draggable = true;
            image.setAttribute('ondragstart', 'drag(event)');
            return image;
        }

        // Función para permitir el arrastre de las imágenes
        function drag(event) {
            event.dataTransfer.setData('image', event.target.src);
        }

        // Manejar el soltar de la imagen en el contenedor inferior
        imageDropContainer.ondragover = (event) => event.preventDefault();

        imageDropContainer.ondrop = (event) => {
            event.preventDefault();
            if (imageDropContainer.childElementCount < maxImages) {
                const imageSrc = event.dataTransfer.getData('image');
                if (imageSrc) {
                    const image = createImageElement(imageSrc);
                    imageDropContainer.appendChild(image);
                }
            }
        };
        const resetButton = document.getElementById('resetButton');
        resetButton.addEventListener('click', () => {
            // Remueve todos los elementos del contenedor inferior
            while (imageDropContainer.firstChild) {
                imageDropContainer.removeChild(imageDropContainer.firstChild);
            }
        });
    </script>
</body>
</html>
