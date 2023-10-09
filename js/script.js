const pianoKeys = document.querySelectorAll(".piano-keys .key"),
  volumeSlider = document.querySelector(".volume-slider input"),
  keysCheckbox = document.querySelector(".keys-checkbox input"),
  notesDisplay = document.querySelector(".notes-display .notes");

let allKeys = [],
  audio = new Audio(`../tunes/a.wav`), // by default, audio src is "a" tune
  activeNotes = new Set();

const updateNotesDisplay = () => {
  notesDisplay.textContent = [...activeNotes].join(", ");
};

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
    audioNote.volume = volumeSlider.value; // Aplicar el volumen del slider
    audioNote.play();
  });

  // Agregar todas las notas al conjunto de notas activas
  activeNotes = new Set(notes);

  // Actualizar el contenido del div de notas para mostrar las notas activas
  updateNotesDisplay();

  // Mostrar la nota en el teclado
  notes.forEach((note) => {
    const keyElement = document.querySelector(`[data-key="${note}"]`);
    showNoteOnKeyboard(keyElement);
  });
};

pianoKeys.forEach((key) => {
  allKeys.push(key.dataset.key);
  key.addEventListener("click", () => playTune([...activeNotes, key.dataset.key]));
});

const handleVolume = (e) => {
  const newVolume = e.target.value;
  activeNotes.forEach((note) => {
    const audioNote = new Audio(`tunes/${note}.wav`);
    audioNote.volume = newVolume; // Aplicar el nuevo volumen a las notas activas
    if (!audioNote.paused) {
      audioNote.pause();
      audioNote.currentTime = 0;
      audioNote.play();
    }
  });
};

const showHideKeys = () => {
  pianoKeys.forEach((key) => key.classList.toggle("hide"));
};

const pressedKey = (e) => {
  const key = e.key.toLowerCase();
  if (allKeys.includes(key) && !activeNotes.has(key)) {
    playTune([...activeNotes, key]);
  }
};

const releasedKey = (e) => {
  const key = e.key.toLowerCase();
  if (allKeys.includes(key)) {
    activeNotes.delete(key);
    updateNotesDisplay();

    // Ocultar la nota en el teclado al soltar la tecla
    const keyElement = document.querySelector(`[data-key="${key}"]`);
    hideNoteOnKeyboard(keyElement);
  }
};

keysCheckbox.addEventListener("click", showHideKeys);
keysCheckbox.addEventListener("change", () => {
  if (keysCheckbox.checked) {
    // Si la casilla está marcada, mostrar todas las teclas
    pianoKeys.forEach((key) => key.classList.remove("hide"));
  } else {
    // Si la casilla no está marcada, ocultar todas las teclas
    pianoKeys.forEach((key) => key.classList.add("hide"));
  }
  
});

volumeSlider.addEventListener("input", handleVolume);
document.addEventListener("keydown", pressedKey);
document.addEventListener("keyup", releasedKey);
