
document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner le bouton, l'image du thème et le corps du document
    const themeToggle = document.getElementById("themeToggle");
    const themeIcon = document.getElementById("themeIcon");
    const body = document.body;

    // Vérifie et applique le thème sélectionné dans le stockage local
    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark-mode");
        themeIcon.src = "image/nuit_logo.png"; // Logo nuit par défaut
    } else {
        themeIcon.src = "image/jour_logo.png"; // Logo jour par défaut
    }

    // Fonction pour basculer entre les thèmes
    function toggleTheme() {
        body.classList.toggle("dark-mode");
        const isDarkMode = body.classList.contains("dark-mode");
        // Change l'icône en fonction du mode
        themeIcon.src = isDarkMode ? "image/nuit_logo.png" : "image/jour_logo.png";
        // Sauvegarde le mode dans le stockage local
        localStorage.setItem("theme", isDarkMode ? "dark" : "light");
    }

    // Ajouter un écouteur d'événement pour changer de thème sans recharger la page
    themeToggle.addEventListener("click", toggleTheme);
});