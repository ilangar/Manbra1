const audioPlayer = document.getElementById("audio-player");
const playButton = document.getElementById("play-button");
const resetButton = document.getElementById("reset-button");


const instruments = [
  "../instrumentos/cuerdas/guitarra acustica.wav",
  "../instrumentos/cuerdas/guitarra.mp4",
  "../instrumentos/cuerdas/violin.mp3",
  "../instrumentos/cuerdas/bajo.wav"
];

const images = [
  "../instrumentos/cuerdas/guitarra acustica.webp",
  "../instrumentos/cuerdas/guitarra.webp",
  "../instrumentos/cuerdas/guitarra acustica.webp",
  "../instrumentos/cuerdas/bajo.png"
];


const container = document.querySelector("#instrumentos");

const img1 = document.createElement("img");
img1.src = "../instrumentos/cuerdas/guitarra acustica.webp";
img1.alt = "guitarra";
img1.width="150";
img1.height="150";
img1.setAttribute('data-index','0');
img1.classList.add('option');

const img2 = document.createElement("img");
img2.src = "../instrumentos/cuerdas/guitarra.webp";
img2.alt = "guitarra";
img2.width="150";
img2.height="150";
img2.setAttribute('data-index','1');
img2.classList.add('option');

const img3 = document.createElement("img");
img3.src = "../instrumentos/cuerdas/violin.png";
img3.alt = "violin";
img3.width="150";
img3.height="150";
img3.setAttribute('data-index','2');
img3.classList.add('option');

const img4 = document.createElement("img");
img4.src = "../instrumentos/cuerdas/bajo.png";
img4.alt = "bajo";
img4.width="150";
img4.height="150";
img4.setAttribute('data-index','3');
img4.classList.add('option');

container.appendChild(img1);
container.appendChild(img2);
container.appendChild(img3);
container.appendChild(img4);

const options = document.getElementsByClassName("option");

/*
      <img src="../instrumentos/cuerdas/guitarra acustica.webp" class="option" data-index="0">
      <img src="../instrumentos/cuerdas/guitarra.webp" class="option" data-index="1">
      <img src="../instrumentos/cuerdas/violin.png" class="option" data-index="2">
      <img src="../instrumentos/cuerdas/bajo.png" class="option" data-index="3">
*/

let correctInstrumentIndex = Math.floor(Math.random() * instruments.length);

playButton.addEventListener("click", playSound);
resetButton.addEventListener("click", resetGame);

for (let i = 0; i < options.length; i++) {
  options[i].addEventListener("click", function () {
    checkAnswer(i);
  });
}

function playSound() {
  audioPlayer.src = instruments[correctInstrumentIndex];
  audioPlayer.play();

}
// Configuración de los índices correctos según la ruta de la pista de audio
if (audioPlayer.src === instruments[0]) {
  correctInstrumentIndex = 0;
} else if (audioPlayer.src === instruments[1]) {
  correctInstrumentIndex = 1;
} else if (audioPlayer.src === instruments[2]) {
  correctInstrumentIndex = 2;
} else if (audioPlayer.src === instruments[3]) {
  correctInstrumentIndex = 3;
}
else if (audioPlayer.src === instruments[4]) {
  correctInstrumentIndex = 4;
}

function checkAnswer(selectedIndex) {
  if (selectedIndex === correctInstrumentIndex) {
    alert("¡Correcto! Adivinaste el instrumento correcto.");
   showNextInstruments();

  } else {
    alert("¡Oops! Intenta de nuevo.");
  }
}

function resetGame() {
  correctInstrumentIndex = Math.floor(Math.random() * instruments.length);
  audioPlayer.pause();
  audioPlayer.currentTime = 0;
}






