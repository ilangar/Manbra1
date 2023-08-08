const pianoKeys = document.querySelectorAll(".piano-keys .key"),
  volumeSlider = document.querySelector(".volume-slider input"),
  keysCheckbox = document.querySelector(".keys-checkbox input");

let allKeys = [],
  audio,
  activeNotes = new Set(); // Usamos un Set para almacenar las notas activas

const playTune = (notes) => {
  // Detener la reproducción de las notas activas
  activeNotes.forEach((note) => {
    const audioNote = new Audio(`../tunes/${note}.wav`);
    audioNote.pause();
    audioNote.currentTime = 0;
  });

  // Crear una nueva instancia de Audio para cada nota y reproducirlas todas
  notes.forEach((note) => {
    const audioNote = new Audio(`../tunes/${note}.wav`);
    audioNote.play();
  });

  // Agregar todas las notas al conjunto de notas activas
  notes.forEach((note) => activeNotes.add(note));

  // Remover las notas activas después de un tiempo
  setTimeout(() => {
    notes.forEach((note) => activeNotes.delete(note));
  }, 150);
};

pianoKeys.forEach((key) => {
  allKeys.push(key.dataset.key);
  key.addEventListener("click", () => playTune([key.dataset.key])); // Ahora pasamos un array con la nota al hacer clic
});

const handleVolume = (e) => {
  if (audio) {
    audio.volume = e.target.value;
  }
};

const showHideKeys = () => {
  pianoKeys.forEach((key) => key.classList.toggle("hide"));
};

const pressedKey = (e) => {
  const key = e.key.toLowerCase();
  if (allKeys.includes(key) && !activeNotes.has(key)) {
    // Reproducir el acorde solo si la nota no está en el conjunto de notas activas
    playTune([...activeNotes, key]); // Ahora pasamos un array con todas las notas activas y la nueva nota
  }
};

const releasedKey = (e) => {
  const key = e.key.toLowerCase();
  if (allKeys.includes(key)) {
    activeNotes.delete(key); // Eliminamos la nota del conjunto de notas activas al soltar la tecla
  }
};

keysCheckbox.addEventListener("click", showHideKeys);
volumeSlider.addEventListener("input", handleVolume);
document.addEventListener("keydown", pressedKey);
document.addEventListener("keyup", releasedKey);
