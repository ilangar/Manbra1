const audioPlayer = document.getElementById("audio-player");
const playButton = document.getElementById("play-button");
const optionsSelect = document.getElementById("options-select");
const checkButton = document.getElementById("check-button");

const instruments = [
  "../instrumentos/guitarra.mp3",
  "../instrumentos/bajo.wav",
  "../instrumentos/guitarra acustica.wav",
  "../instrumentos/bombo.wav"
];

let correctInstrumentIndex = Math.floor(Math.random() * instruments.length);

playButton.addEventListener("click", playSound);
checkButton.addEventListener("click", checkAnswer);

function playSound() {
  audioPlayer.src = instruments[correctInstrumentIndex];
  audioPlayer.play();
}

function checkAnswer() {
  const selectedOption = parseInt(optionsSelect.value);

  if (selectedOption === correctInstrumentIndex) {
    alert("Correct! You guessed the right instrument.");
  } else {
    alert("Oops! Please try again.");
  }
}