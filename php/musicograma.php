<?php
session_start();
?>
<!DOCTYPE html>
<html>
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
            height: 50vh; /* Altura del 80% del viewport height (altura de la ventana) */
            background-color: #f0f0f0; /* Fondo gris claro para el contenedor */
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
<body>
    <h1>Generador de Patrones de Imágenes</h1>
    
    <div class="image-container" id="image-container">
        <!-- Deja este espacio vacío para las imágenes iniciales -->
    </div>
    
    <div class="image-drop-container" id="image-drop-container"></div>

    <script>
        const images = ["../diseño/hamburguesa.png", "../diseño/platillos.png", "../diseño/silencio.png", "../diseño/chasquido.png", "../diseño/aplauso.png", "../diseño/bongo.png", "../diseño/xilofono.png"]; // Rutas de las imágenes
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
    </script>
</body>
</html>
