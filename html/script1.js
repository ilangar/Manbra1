$(document).ready(function(){

const audioPlayer = document.getElementById("audio-player");
const playButton = document.getElementById("play-button");
const resetButton = document.getElementById("reset-button");
const img1 = document.createElement("img");
const img2 = document.createElement("img");
const img3 = document.createElement("img");
const img4 = document.createElement("img");

const instruments1 = [
  "../instrumentos/cuerdas/guitarra acustica.wav",
  "../instrumentos/cuerdas/guitarra.mp4",
  "../instrumentos/cuerdas/violin.mp3",
  "../instrumentos/cuerdas/bajo.wav"
];

const instruments2 = [
  "../instrumentos/viento/acordeon.mp3",
  "../instrumentos/viento/piano.mp3",
  "../instrumentos/viento/trompeta.mp3",
  "../instrumentos/viento/flauta.mp3",

];

const instruments3 = [
  "../instrumentos/percusion/bateria.mp3",
  "../instrumentos/percusion/bombo.wav",
  "../instrumentos/percusion/pandereta.mp3",
  "../instrumentos/percusion/triangulo.mp3",

];

let correctInstrumentIndex=0;
let grupo=0;

const container = document.querySelector("#instrumentos");

Carga1();

function Carga1(){
  Recarga("../instrumentos/cuerdas/guitarra acustica.webp","guitarra","../instrumentos/cuerdas/guitarra.webp","guitarra","../instrumentos/cuerdas/violin.png","violin","../instrumentos/cuerdas/bajo.png","bajo","instruments1");
  grupo=1;
}


function Recarga(src1,al1,src2,al2,src3,al3,src4,al4,instru){
    
      img1.src = src1;
      img1.alt = al1;
      img1.width="150";
      img1.height="150";
      img1.setAttribute('data-index',0);
      img1.classList.add('option');
      
      
      img2.src = src2;
      img2.alt = al2;
      img2.width="150";
      img2.height="150";
      img2.setAttribute('data-index',1);
      img2.classList.add('option');
      
      
      img3.src = src3;
      img3.alt = al3;
      img3.width="150";
      img3.height="150";
      img3.setAttribute('data-index',2);
      img3.classList.add('option');
      
      
      img4.src = src4;
      img4.alt = al4;
      img4.width="150";
      img4.height="150";
      img4.setAttribute('data-index',3);
      img4.classList.add('option');
  
      container.appendChild(img1);
      container.appendChild(img2);
      container.appendChild(img3);
      container.appendChild(img4);
      
      seleccionarInstrumento(instru);

}


function seleccionarInstrumento(instrumento){
      if (instrumento=='instruments1'){
        correctInstrumentIndex = Math.floor(Math.random() * instruments1.length);
        audioPlayer.src = instruments1[correctInstrumentIndex];  
      }else if (instrumento=='instruments2'){
        correctInstrumentIndex = Math.floor(Math.random() * instruments2.length);
        audioPlayer.src = instruments2[correctInstrumentIndex];  
      }else if (instrumento=='instruments3'){
        correctInstrumentIndex = Math.floor(Math.random() * instruments3.length);
        audioPlayer.src = instruments3[correctInstrumentIndex];  
      }
}

$(".option").click(function(){
    cual=$(this).attr("data-index");
    checkAnswer(cual);
});


function limpiarcomponentes(){
  container.removeChild(img1);
  container.removeChild(img2);
  container.removeChild(img3);
  container.removeChild(img4);
}

  
  playButton.addEventListener("click", playSound);
  resetButton.addEventListener("click", resetGame);
  

  function playSound() {
    audioPlayer.play();
  }

  function checkAnswer(selectedIndex) {
    if (selectedIndex == correctInstrumentIndex) {
      alert("¡Correcto! Adivinaste el instrumento correcto.");
      
      if (grupo==1){
        limpiarcomponentes();
        Recarga("../instrumentos/viento/acordeon.png","acordeon","../instrumentos/viento/piano.png","piano","../instrumentos/viento/trompeta.png","trompeta","../instrumentos/viento/flauta.png","flauta","instruments2");   
        grupo=2;  
      }else if (grupo==2){
        limpiarcomponentes();
        Recarga("../instrumentos/percusion/bateria.webp","bateria","../instrumentos/percusion/bombo.png","bombo","../instrumentos/percusion/pandereta.png","pandereta","../instrumentos/percusion/triangulo.png","triangulo","instruments3");   
        grupo=3;
      }else if (grupo==3){
        Carga1();
      }

      resetGame();
    } else {
      alert("¡Oops! Intenta de nuevo.");
    }
  }

  function resetGame() {
    audioPlayer.pause();
    audioPlayer.currentTime = 0;
  }

});