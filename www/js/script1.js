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

<select id="options-select">
<option value="0">../instrumentos/guitarra.webp</option>
<option value="1">../instrumentos/bajo.png</option>
<option value="2">../instrumentos/guitarra acustica.webp</option>
<option value="3">../instrumentos/bateria.webp</option>
</select>

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
    alert("Oops! Vuelve a intentar.");
  }
}