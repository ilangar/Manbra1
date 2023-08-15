const audioPlayer = document.getElementById("audio-player");
const playButton = document.getElementById("play-button");
const resetButton = document.getElementById("reset-button");
const options = document.getElementsByClassName("option");

const instruments = [
  "../instrumentos/guitarra acustica.wav",
  "../instrumentos/guitarra.mp4",
  "../instrumentos/bateria.mp3",
  "../instrumentos/bajo.wav",
  "../instrumentos/acordeon.mp3"
];

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

function checkAnswer(selectedIndex) {
  if (selectedIndex === correctInstrumentIndex) {
    alert("¡Correcto! Adivinaste el instrumento correcto.");
  } else {
    alert("¡Oops! Intenta de nuevo.");
  }
}

function resetGame() {
  correctInstrumentIndex = -1; // Restablecemos el índice correcto
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
