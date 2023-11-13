const images = [ "../diseño/silencio.png", "../diseño/chasquido.png", "../diseño/aplauso.png", "../diseño/zapateo.png", "../diseño/golpeo.png"]; // Rutas de las imágenes
        const imageContainer = document.getElementById('image-container');
        const imageDropContainer = document.getElementById('image-drop-container');
        const maxImages = 6; 

        images.forEach((imageSrc, index) => {
            const image = createImageElement(imageSrc);
            imageContainer.appendChild(image);
        });

        function createImageElement(imageSrc) {
            const image = document.createElement('img');
            image.src = imageSrc;
            image.className = 'image';
            image.draggable = true;
            image.setAttribute('ondragstart', 'drag(event)');
            return image;
        }

        function drag(event) {
            event.dataTransfer.setData('image', event.target.src);
        }

        imageDropContainer.ondragover = (event) => event.preventDefault();

        let Patron = '';

imageDropContainer.ondrop = (event) => {
    event.preventDefault();
    if (imageDropContainer.childElementCount < maxImages) {
        const imageSrc = event.dataTransfer.getData('image');
        if (imageSrc) {
            const image = createImageElement(imageSrc);
            imageDropContainer.appendChild(image);
            parseo = imageSrc.split("/");
            if (Patron == ''){
                Patron=parseo[6];
            }else{
                Patron = Patron + 'X' + parseo[6];
            }
        }
    }
}

$("#Guardar").click(function () {
    $.ajax({
        type: 'POST',
        url: 'guardarPatron.php',
        data: { patron: Patron }, 
        dataType: 'text',
        success: function (response) {
            alert(response);
        },
        error: function (error) {
            console.error(error);
        }
    });
});

           
        


        const resetButton = document.getElementById('resetButton');
        resetButton.addEventListener('click', () => {
            while (imageDropContainer.firstChild) {
                imageDropContainer.removeChild(imageDropContainer.firstChild);
            }
        });

        $(document).ready(function () {

            $("#Guardar").click(function () {
                $.ajax({
                    type: "POST",
                    url: "../php/guardarPatron.php",
                    dataType: "text",
                    data: "",
                    success: function (devolucion) {
                        $("#mensaje").html(devolucion);
                        
                        if (devolucion == "Patrón guardado correctamente") {
                            $("#mensaje").css("color", "black");
                        } else {
                            $("#mensaje").css("color", "red");
                        }
                    },
                    error: function (error) {
                    }
                });
            });
        
        });
        