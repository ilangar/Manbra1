const audioPlayer = document.getElementById("audio-player");
const playButton = document.getElementById("play-button");
const resetButton = document.getElementById("reset-button");
let inst='';
let imginst='';

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

/*
Recarga("../instrumentos/cuerdas/guitarra acustica.webp","guitarra","../instrumentos/cuerdas/guitarra.webp","guitarra","../instrumentos/cuerdas/violin.png","violin","../instrumentos/cuerdas/bajo.png","bajo");


function Recarga(src1,al1,src2,al2,src3,al3,src4,al4){
  const img1 = document.createElement("img");
  img1.src = src1;
  img1.alt = al1;
  img1.width="150";
  img1.height="150";
  img1.setAttribute('data-index','0');
  img1.classList.add('option');
  
  const img2 = document.createElement("img");
  img2.src = src2;
  img2.alt = al2;
  img2.width="150";
  img2.height="150";
  img2.setAttribute('data-index','1');
  img2.classList.add('option');
  
  const img3 = document.createElement("img");
  img3.src = src3;
  img3.alt = al3;
  img3.width="150";
  img3.height="150";
  img3.setAttribute('data-index','2');
  img3.classList.add('option');
  
  const img4 = document.createElement("img");
  img4.src = src4;
  img4.alt = al4;
  img4.width="150";
  img4.height="150";
  img4.setAttribute('data-index','3');
  img4.classList.add('option');
  
  container.appendChild(img1);
  container.appendChild(img2);
  container.appendChild(img3);
  container.appendChild(img4);
  const options = document.getElementsByClassName("option");

  for (let i = 0; i < options.length; i++) {
    options[i].addEventListener("click", function () {
      checkAnswer(i);
    });
  }
  let correctInstrumentIndex = Math.floor(Math.random() * 4);  

}
*/
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

for (let i = 0; i < options.length; i++) {
  options[i].addEventListener("click", function () {
    checkAnswer(i);
  });
}


let correctInstrumentIndex = Math.floor(Math.random() * instruments.length);

playButton.addEventListener("click", playSound);
resetButton.addEventListener("click", resetGame);


function playSound() {
  audioPlayer.src = instruments[correctInstrumentIndex];
  audioPlayer.play();

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


const instruments1 = [
  "../instrumentos/viento/acordeon.mp3",
  "../instrumentos/viento/piano.mp3",
  "../instrumentos/viento/trompeta.mp3",
  "../instrumentos/viento/flauta.mp3",

];

const images1 = [
  "../instrumentos/viento/acordeon.png",
  "../instrumentos/viento/piano.png",
  "../instrumentos/viento/trompeta.png",
  "../instrumentos/viento/flauta.png",
];


function loadNewInstruments() {
  instruments.length = 0; 
  images.length = 0; 

  
  if(inst=='' && imginst==''){
    inst='instruments1';
    imginst='images1';
    instruments.push(...instruments1);
    images.push(...images1);
  }else if (inst=='instruments1' && imginst=='images1'){
    inst='instruments2';
    imginst='images2';
    instruments.push(...instruments2);
    images.push(...images2);
  }else if (inst=='instruments2' && imginst=='images2'){
    inst='';
    imginst='';
    instruments.push(...instruments);
    images.push(...images);
  }
 
  
  
  resetGame();
}


function showNextInstruments() {
  
  //Recarga("../instrumentos/cuerdas/guitarra acustica.webp","guitarra","../instrumentos/cuerdas/guitarra.webp","guitarra","../instrumentos/cuerdas/violin.png","violin","../instrumentos/cuerdas/bajo.png","bajo");
  loadNewInstruments(); 
  correctInstrumentIndex = Math.floor(Math.random() * instruments.length);
  audioPlayer.pause();
  audioPlayer.currentTime = 0;

 
  for (let i = 0; i < options.length; i++) {
    options[i].src = images[i];
    options[i].alt = "Nuevo instrumento"; 
  }
}
const instruments2 = [
  "../instrumentos/percusion/bateria.mp3",
  "../instrumentos/percusion/bombo.wav",
  "../instrumentos/percusion/pandereta.mp3",
  "../instrumentos/percusion/triangulo.mp3",

];

const images2 = [
  "../instrumentos/percusion/bateria.webp",
  "../instrumentos/percusion/bombo.png",
  "../instrumentos/percusion/pandereta.png",
  "../instrumentos/percusion/triangulo.png",

];

