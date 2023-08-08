const audioPlayer = document.getElementById("audio-player");
const options = document.querySelectorAll(".option");

const instruments = [
  "instrument1.mp3",
  "instrument2.mp3",
  "instrument3.mp3",
  "instrument4.mp3"
];

let correctInstrumentIndex = Math.floor(Math.random() * instruments.length);

// Play the sound of the correct instrument
audioPlayer.src = instruments[correctInstrumentIndex];
audioPlayer.play();

// Set up click event listeners for each option
options.forEach((option, index) => {
  option.addEventListener("click", () => checkAnswer(index));
});

function checkAnswer(selectedIndex) {
  if (selectedIndex === correctInstrumentIndex) {
    alert("Correct! You guessed the right instrument.");
  } else {
    alert("Oops! Try again.");
  }
}
