const instrumentContainer = document.getElementById("instrument-container");
const instrumentList = document.getElementById("instrument-list");


const instruments = [
    "../diseño/hamburguesa.png",
    "../diseño/platillos.png",
    "../diseño/silencio.png",
    "../diseño/chasquido.png",
    "../diseño/aplauso.png",
    "../diseño/bongo.png",
    "../diseño/xilofono.png"
];


instruments.forEach(instrument => {
    const img = document.createElement("img");
    img.src = `diseño/${instrument}`; // Asegúrate de que las imágenes estén en la carpeta "diseño"
    img.addEventListener("click", () => selectInstrument(instrument));
    instrumentList.appendChild(img);
});

const selectedInstruments = [];

function selectInstrument(instrument) {
    if (selectedInstruments.length >= 6) {
        alert("Ya has seleccionado 6 instrumentos.");
        return;
    }

    selectedInstruments.push(instrument);

    const img = document.createElement("img");
    img.src = `diseño/${instrument}`; // Asegúrate de que las imágenes estén en la carpeta "diseño"
    instrumentContainer.appendChild(img);
}