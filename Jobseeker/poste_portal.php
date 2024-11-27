<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/poste.css?v=<?php echo time();?>"/>
    <title>Trouvez une alternance !</title>
</head>
<body data-page="poste_portalPage">
    <?php
        session_start();
        include 'api.php';
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['email'])) {
            // Redirige vers la page de connexion si non connecté
            header("Location: login.php");
            exit;
        }

        // Utilisez la fonction pour obtenir les informations de l'utilisateur
        $userInfo = get_infos($_SESSION['email']);

        // Si l'utilisateur existe, récupérez le prénom et le nom
        if ($userInfo) {
            $prenom = htmlspecialchars($userInfo['prenom']);
            $nom = htmlspecialchars($userInfo['nom']);
        }
        else {
            header("Location: login.php");
            exit;
        }
    ?>
    <!-- En-tête du site -->
    <header>
        <div class="image-container">
            <a><img onclick="window.location.href='test.php';" style="cursor: pointer;" src="image/logo_web_edited.png" alt="Image centrée en haut" class="centered-image"></a>
        </div>
    </header>

    <!-- Navigation -->
    <nav>
        <div class="box_profile"><span id="activeAccount"></span><?php echo "$prenom $nom";?></div>
        <a><button class="btn" id="langage"></button></a><script src="english_french.js?v=<?php echo time();?>"></script>
        <a><button class="btn" id="themeToggle"><img id="themeIcon" src="jour_logo.png" alt="Theme Icon">
        </button></a><script src="nuit_jour.js?v=<?php echo time();?>"></script>
        <a href="edit.php"><button class="btn" id="editProfile"></button></a>
        <a href="logout.php"><button class="btn" id="logout"></button></a>
    </nav>

    <!-- Contenu principal -->
    <div id="box_titrePoste" class="box_titrePoste"></div>
    
    <div class="centre">
        <div class="main-container">
            <!-- Box de gauche : Détails de l'offre -->
            <div class="box_left">
                <h3 id="titre_detail"></h3>
                <p><strong id="company"></strong><span id="companyName"></span></p>
                <p><strong id="poste"></strong><span id="posteName"></span></p>
                <p><strong id="description"></strong><span id="descriptionName"></span></p>
                <p><strong id="place"></strong><span id="placeName"></span></p>
                <p><strong id="rythme"></strong><span id="rythmeName"></span ></p>
                <p><strong id="time"></strong><span id="timeName"></span></p>
            </div>

            <!-- Box de droite : Champ de candidature -->
            <div class="box_right">
                <h3 id="titre_poste"></h3>
                <form action="api.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="poste" value="poste_portal"> <!-- Identifiant du poste -->
                    <div class="field">
                        <label id="lettre" for="lettre"></label>
                        <textarea id="lettre" name="lettre" rows="10"></textarea>
                    </div>
                    <div class="field">
                        <label id="resume" for="cv"></label>
                        <input type="file" id="cv" name="cv" accept=".pdf, .doc, .docx">
                    </div>
                    <div>
                        <input id="btn_postuler" type="submit" class="btn" name="postuler" value="">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Pied de page -->
    <footer>
        <p>&copy; 2024 Trouvez une alternance !<br>Crédit : Jugurtha Menasria</br></p>
    </footer>
</body>
</html>