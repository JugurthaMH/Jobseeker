// Sélection du bouton de changement de langue
const langage = document.getElementById("langage");

function toggleLanguage() {
    const currentLanguage = localStorage.getItem("language") || "fr";
    const newLanguage = currentLanguage === "en" ? "fr" : "en";
    
    // Met à jour la langue et enregistre-la dans le localStorage
    localStorage.setItem("language", newLanguage);

    // Recharge la page avec la nouvelle langue
    loadLanguage(newLanguage);
}

// Initialiser la langue au chargement de la page
document.addEventListener("DOMContentLoaded", () => {
    const savedLanguage = localStorage.getItem("language") || "fr";  // Par défaut, le français
    loadLanguage(savedLanguage);
});

// Ajouter l'écouteur d'événement pour changer la langue
langage.addEventListener("click", toggleLanguage);

const translations = {
    "en": {
        "general": {
            "activeAccount": "Active Account : ",
            "langage": "English",
            "editProfile": "Edit Profile",
            "logout": "Logout",
            "footer": "&copy; 2024 Trouvez une alternance !<br>Credit : Jugurtha Menasria</br>",
        },
        "testPage": {
            "box_titrePoste": "Here is the list of apprenticeships currently available",
            "petitTexte1": "Kalos National League",
            "largeTexte1": "Apprenticeship - Pokémon Trainer",
            "petitTexte2": "Aperture Science",
            "largeTexte2": "Test subject for a Machine Learning project",
            "petitTexte3": "Coupe & Découpe",
            "largeTexte3": "Apprenticeship - Hairdresser at home",
            "petitTexte4": "Start-Up Lambda",
            "largeTexte4": "Apprenticeship - IT Developer",
            "postule": "Applied",
            "poste1": "View position",
        },
        "editPage": {
            "header1": "Edit profile",
            "nom":"Last Name",
            "prenom":"First Name",
            "mdp":"Password",
            "enregistre":"Update",
            "btn_supprimer":"Delete the account",
        },
        "poste_dresseurPage": {
            "box_titrePoste": "Apprenticeship - Pokémon Trainer",
            "titre_detail": "Offer Details",
            "company": "Company:",
            "companyName": " Kalos National League",
            "poste":"Position:",
            "posteName":" Pokémon Trainer",
            "description":"Description:",
            "descriptionName":" Train Pokémon and participate in competitions to become the Kalos Champion. Equip yourself with up to 6 Pokémon.",
            "place": "Location:",
            "placeName": " Kalos, Pokémon Region",
            "rythme": "Apprenticeship Rhythm:",
            "rythmeName": " 1 Week Company / 1 Week School",
            "time": "Duration:",
            "timeName": " 12 Months",
            "titre_poste": "Apply for this position",
            "lettre":"Cover Letter:",
            "resume":"Resume:",
            "btn_postuler":"Apply",
        },
        "poste_portalPage": {
            "box_titrePoste": "Test Subject for a Machine Learning Project",
            "titre_detail": "Offer Details",
            "company": "Company:",
            "companyName": " Aperture Science",
            "poste": "Position:",
            "posteName": " Test Subject",
            "description": "Description:",
            "descriptionName": " Experience the ultimate scientific testing adventure! Are you ready for a mind-bending journey where each moment challenges your thinking skills to their limits? Step into the Aperture Science research lab and become the subject of high-tech experiments that will forever change your perception of physics and logic! Picture yourself in a mysterious, complex environment guided by GLaDOS, the most advanced artificial intelligence ever created. Each test will confront you with increasingly tricky situations, where you'll need to use portals to navigate ever-changing rooms, solve complex puzzles, and manipulate objects in a three-dimensional space. A cake is promised at the end.",
            "place": "Location:",
            "placeName": " Revealed in due time",
            "rythme": "Apprenticeship Rhythm:",
            "rythmeName": " One session should suffice.",
            "time": "Duration:",
            "timeName": " 12 to 9999 Months",
            "titre_poste": "Apply for this position",
            "lettre": "Cover Letter:",
            "resume": "Resume:",
            "btn_postuler": "Apply",
        },
        "poste_coiffeurPage": {
            "box_titrePoste": "Apprenticeship - Home Hairdresser",
            "titre_detail": "Offer Details",
            "company": "Company:",
            "companyName": " Coupe & Découpe",
            "poste": "Position:",
            "posteName": " Hairdresser",
            "description": "Description:",
            "descriptionName": " Are you passionate about the world of hairdressing and want to combine creativity with personal interaction? Join our team as a Home Hairdresser! As part of this apprenticeship, you will be trained in professional hairdressing techniques while working directly at our clients' homes. You'll have the opportunity to perform a wide range of services: cutting, styling, coloring, as well as hair treatments, offering personalized and high-quality service. This position is the perfect opportunity to develop your technical and interpersonal skills while enjoying the autonomy that comes with working from home. If you have excellent presentation, an impeccable sense of customer service, and the desire to make every service an enjoyable experience for your clients, we would be delighted to welcome you to our team. Join us and help offer exceptional hairdressing experiences directly at our clients' homes!",
            "place": "Location:",
            "placeName": " Near the 18th Arrondissement of Paris",
            "rythme": "Apprenticeship Rhythm:",
            "rythmeName": " 1 Month Company / 1 Month School",
            "time": "Duration:",
            "timeName": " 24 months",
            "titre_poste": "Apply for this position",
            "lettre": "Cover Letter:",
            "resume": "Resume:",
            "btn_postuler": "Apply",
        },
        "poste_developpeurPage": {
            "box_titrePoste": "Apprenticeship - IT Developer",
            "titre_detail": "Offer Details",
            "company": "Company:",
            "companyName": " Start-Up Lambda",
            "poste": "Position:",
            "posteName": " IT Developer",
            "description": "Description:",
            "descriptionName": " Apprenticeship position for an IT developer. Open to all. Requires 7 years of professional experience in development. Applications will only be considered for Master's degree holders.",
            "place": "Location:",
            "placeName": " Paris",
            "rythme": "Apprenticeship Rhythm:",
            "rythmeName": " 2 Weeks Company / 3 Weeks School, then alternating each week to 3 Weeks Company / 2 Weeks School, except for months with fewer than 31 days where it will be 3 Weeks Company / 1 Week School. Additionally, account for leap years where +2 weeks are added to the previously mentioned values.",
            "time": "Duration:",
            "timeName": " 12 to 24 Months",
            "titre_poste": "Apply for this position",
            "lettre": "Cover Letter:",
            "resume": "Resume:",
            "btn_postuler": "Apply",
        },
        "loginPage": {
            "connexion": "Login",
            "mdp": "Password",
            "btn_connexion": "Login",
            "message1": "Not yet joined ? ",
            "message2": "Sign up!"
        },
        "signupPage": {
            "signup": "Sign Up",
            "nom": "Last Name",
            "prenom": "First Name",
            "mdp": "Password",
            "btn_inscrire": "Sign Up",
            "message1": "Already have an account ? ",
            "message2": "Login!",
        },
    },
    "fr": {
        "general": {
            "activeAccount": "Compte actif : ",
            "langage": "Français",
            "editProfile": "Modifier le profil",
            "logout": "Déconnexion",
            "footer": "&copy; 2024 Trouvez une alternance !<br>Crédit : Jugurtha Menasria</br>",
        },
        "testPage": {
            "box_titrePoste": "Voici la liste des alternances disponibles actuellement",
            "petitTexte1": "Ligue Nationale de Kalos",
            "largeTexte1": "Alternance - Dresseur de Pokémon",
            "petitTexte2": "Aperture Science",
            "largeTexte2": "Sujet de test pour un projet de Machine Learning",
            "petitTexte3": "Coupe & Découpe",
            "largeTexte3": "Apprentissage - Coiffeur à domicile",
            "petitTexte4": "Start-Up Lambda",
            "largeTexte4": "Alternance - Développeur Informatique",
            "postule": "Candidaté",
            "poste1": "Voir le poste",
        },
        "editPage": {
            "header1": "Modifier le profil",
            "nom":"Nom",
            "prenom":"Prénom",
            "mdp":"Mot de Passe",
            "enregistre":"Enregistrement",
            "btn_supprimer":"Supprimer le compte",
        },
        "poste_dresseurPage": {
            "box_titrePoste": "Alternance - Dresseur de Pokémon",
            "titre_detail":"Détails de l'offre",
            "company":"Entreprise :",
            "companyName":" Ligue Nationale de Kalos",
            "poste":"Poste :",
            "posteName":" Dresseur de Pokémon",
            "description":"Description :",
            "descriptionName":" Entraînez des Pokémon et participez aux compétitions pour devenir le champion de Kalos. Équipe-toi de 6 Pokémon au maximum.",
            "place":"Lieu :",
            "placeName":" Kalos, Région Pokémon",
            "rythme":"Rythme d'alternance :",
            "rythmeName":" 1 Semaine Entreprise / 1 Semaine École",
            "time":"Durée :",
            "timeName":" 12 Mois",
            "titre_poste":"Postuler à cette offre",
            "lettre":"Lettre de Motivation :",
            "resume":"CV :",
            "btn_postuler":"Postuler",
        },
        "poste_portalPage": {
            "box_titrePoste": "Sujet de test pour un projet de Machine Learning",
            "titre_detail":"Détails de l'offre",
            "company":"Entreprise :",
            "companyName":" Aperture Science",
            "poste":"Poste :",
            "posteName":" Expérimentateur",
            "description":"Description :",
            "descriptionName":" Découvrez l'expérience ultime de test scientifique ! Êtes-vous prêt à vivre une aventure intellectuelle hors du commun, où chaque instant pousse vos capacités de réflexion à leurs limites ? Entrez dans le laboratoire de recherche d'Aperture Science et devenez le sujet d'une série d'expériences de haute technologie qui redéfiniront à jamais votre perception de la physique et de la logique !Imaginez-vous, dans un environnement mystérieux et complexe, où vous serez guidé par GLaDOS, l'intelligence artificielle la plus avancée jamais créée. Chaque test vous confrontera à des situations de plus en plus délicates, où vous devrez utiliser des portails pour naviguer à travers des pièces en constante évolution, résoudre des énigmes complexes et manipuler des objets dans un espace tridimensionnel. Un gâteau est promis à la fin.",
            "place":"Lieu :",
            "placeName":" Révélé en temps voulu",
            "rythme":"Rythme d'alternance :",
            "rythmeName":" Une seule session devrait suffire.",
            "time":"Durée :",
            "timeName":" 12 à 9999 Mois",
            "titre_poste":"Postuler à cette offre",
            "lettre":"Lettre de Motivation :",
            "resume":"CV :",
            "btn_postuler":"Postuler",
        },
        "poste_coiffeurPage": {
            "box_titrePoste": "Apprentissage - Coiffeur à domicile",
            "titre_detail":"Détails de l'offre",
            "company":"Entreprise :",
            "companyName":" Coupe & Découpe",
            "poste":"Poste :",
            "posteName":" Coiffeur",
            "description":"Description :",
            "descriptionName":" Vous êtes passionné par l’univers de la coiffure et souhaitez allier créativité et contact humain ? Rejoignez notre équipe en tant que Coiffeur à Domicile ! Dans le cadre de cette alternance, vous serez formé(e) aux techniques de coiffure professionnelles tout en intervenant directement chez nos clients. Vous aurez l’opportunité de travailler sur une large gamme de prestations : coupe, coiffage, coloration, mais aussi soins capillaires, en offrant un service personnalisé et de qualité. Ce poste est l'occasion idéale de développer vos compétences techniques et relationnelles tout en bénéficiant de l’autonomie que permet le travail à domicile. Si vous avez une excellente présentation, un sens du service client irréprochable et l’envie de faire de chaque prestation un moment agréable pour vos clients, nous serions ravis de vous accueillir au sein de notre équipe. Rejoignez-nous et participez à offrir des expériences coiffure exceptionnelles directement chez nos clients !",
            "place":"Lieu :",
            "placeName":" Pas loin du 18ème Arrondissement de Paris",
            "rythme":"Rythme d'alternance :",
            "rythmeName":" 1 Mois Entreprise / 1 Mois École",
            "time":"Durée :",
            "timeName":" 24 mois",
            "titre_poste":"Postuler à cette offre",
            "lettre":"Lettre de Motivation :",
            "resume":"CV :",
            "btn_postuler":"Postuler",
        },
        "poste_developpeurPage": {
            "box_titrePoste": "Alternance - Développeur Informatique",
            "titre_detail":"Détails de l'offre",
            "company":"Entreprise :",
            "companyName":" Start-Up Lambda",
            "poste":"Poste :",
            "posteName":" Développeur Informatique",
            "description":"Description :",
            "descriptionName":" Poste d'alternant développeur informatique. Ouvert à tous. Requiert 7 ans expérience professionnel dans le développment. Candidature prise en compte uniquement pour les Master.",
            "place":"Lieu :",
            "placeName":" Paris",
            "rythme":"Rythme d'alternance :",
            "rythmeName":" 2 Semaine Entreprise et 3 Semaine Ecole puis cela s'inverse chaque semaine pour devenir 3 Semaine Entreprise et 2 Semaine Ecole sauf les mois inférieurs à 31 où dans ce cas cela doit être 3 Semaine Entreprise et 1 Semaine Ecole, là encore prendre en compte les années bisextiles où on rajoute +2 aux valeurs précédement citées.",
            "time":"Durée :",
            "timeName":" 12 à 24 Mois",
            "titre_poste":"Postuler à cette offre",
            "lettre":"Lettre de Motivation :",
            "resume":"CV :",
            "btn_postuler":"Postuler",
        },
        "loginPage": {
            "connexion":"Se Connecter",
            "mdp":"Mot de Passe",
            "btn_connexion":"Connexion",
            "message1":"Pas encore rejoint ? ",
            "message2":"Inscrivez-vous !",
        },
        "signupPage": {
            "signup":"S'inscrire",
            "nom":"Nom",
            "prenom":"Prénom",
            "mdp":"Mot de Passe",
            "btn_inscrire":"Inscription",
            "message1":"Déjà un compte ? ",
            "message2":"Connectez-vous !",
        },
    }
};

// Fonction pour charger le contenu dans la langue sélectionnée
function loadLanguage(language) {
    const currentPage = document.body.dataset.page;  // Lit l'attribut data-page
    const pageTranslations = translations[language][currentPage];
    console.log(currentPage);
    if (pageTranslations) {
        // Mise à jour des éléments généraux
        const generalTranslations = translations[language].general;
        if (currentPage == "testPage"){
            document.getElementById("activeAccount").textContent = generalTranslations.activeAccount;
            document.getElementById("langage").textContent = generalTranslations.langage;
            document.getElementById("editProfile").textContent = generalTranslations.editProfile;
            document.getElementById("logout").textContent = generalTranslations.logout;
            document.querySelector("footer p").innerHTML = generalTranslations.footer;
            // Mise à jour de tous les éléments avec la classe "postule"
            document.querySelectorAll(".postule").forEach(element => {
                element.textContent = pageTranslations.postule;
            });

            // Mise à jour de tous les éléments avec la classe "poste"
            document.querySelectorAll(".poste1").forEach(element => {
                element.textContent = pageTranslations.poste1;
            });
        }
        else if(currentPage == "editPage"){
            document.getElementById("activeAccount").textContent = generalTranslations.activeAccount;
            document.getElementById("langage").textContent = generalTranslations.langage;
            document.getElementById("logout").textContent = generalTranslations.logout;
            document.querySelector("footer p").innerHTML = generalTranslations.footer;
        }
        else if(currentPage == "poste_coiffeurPage" || currentPage == "poste_portalPage" || currentPage == "poste_dresseurPage" || currentPage == "poste_developpeurPage"){
            document.getElementById("activeAccount").textContent = generalTranslations.activeAccount;
            document.getElementById("langage").textContent = generalTranslations.langage;
            document.getElementById("editProfile").textContent = generalTranslations.editProfile;
            document.getElementById("logout").textContent = generalTranslations.logout;
            document.querySelector("footer p").innerHTML = generalTranslations.footer;
        }
        else if(currentPage == "loginPage" || currentPage == "signupPage"){
            document.querySelector("footer p").innerHTML = generalTranslations.footer;
        }
        
        // Mise à jour des éléments spécifiques à la page
        for (const [key, value] of Object.entries(pageTranslations)) {
            const element = document.getElementById(key);
            if (element) {
                if (element.tagName === "INPUT" && element.type === "submit") {
                    // Met à jour la valeur si c'est un bouton submit
                    element.value = value;
                } else {
                    // Sinon, met à jour le textContent
                    element.textContent = value;
                }
            }
        }
    }
}
