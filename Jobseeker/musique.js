// J'ai retiré la feature musique, trop volumineuse en octet.

// let isPlaying = false; // Variable pour suivre l'état de la musique (en train de jouer ou pas)
// const music = document.getElementById("music");
// const musicBtn = document.getElementById("musicBtn");

// // Fonction pour démarrer/arrêter la musique
// function toggleMusic() {
//     if (isPlaying) {
//         music.pause();  // Arrête la musique si elle est en cours de lecture
//         musicBtn.textContent = "Play";  // Change le texte du bouton
//     } else {
//         music.play();  // Démarre la musique si elle est en pause
//         musicBtn.textContent = "Pause";  // Change le texte du bouton
//     }
//     isPlaying = !isPlaying;  // Inverse l'état de la musique
// }

// // S'assurer que la musique est arrêtée au départ
// window.addEventListener("load", () => {
//     music.pause();  // Assure que la musique commence en pause
//     musicBtn.textContent = "Play";  // Le texte du bouton indique "Play" au début
// });
///////////////////////////////////////////////////////////////////////////////////////////////////

// Attendre 2.5 secondes, puis cacher le message
function disparition(){
    setTimeout(function() {
        var errorBox = document.getElementById('box_error');
        if (errorBox) {
            errorBox.style.transition = "opacity 0.5s ease"; // Transition pour une disparition progressive
            errorBox.style.opacity = "0"; // Réduit l'opacité à 0 pour faire disparaître progressivement
            setTimeout(() => errorBox.style.display = "none", 500);
        }
    }, 2500);
}