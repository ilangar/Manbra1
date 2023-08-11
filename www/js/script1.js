const audioPlayer = document.getElementById("audio-player");
const playButton = document.getElementById("play-button");
const resetButton = document.getElementById("reset-button");
const options = document.getElementsByClassName("option");

const instruments = [
  "../instrumentos/guitarra acustica.webp",
  "../instrumentos/guitarra.webp",
  "../instrumentos/bateria.webp",
  "../instrumentos/bajo.png"
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
  correctInstrumentIndex = Math.floor(Math.random() * instruments.length);
}
