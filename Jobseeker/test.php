<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/test.css?v=<?php echo time();?>"/>
    <title>Trouvez une alternance !</title>
</head>
<body data-page="testPage">
    <?php
        session_start();
        include 'api.php';
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['email'])) {
            // Redirige vers la page de connexion si non connecté
            header("Location: login.php");
            exit;
        }

        // Sert à obtenir les informations de l'utilisateur
        $userInfo = get_infos($_SESSION['email']);

        // Si l'utilisateur existe, récupérez le prénom, le nom et les postes candidatés
        if ($userInfo) {
            $prenom = htmlspecialchars($userInfo['prenom']);
            $nom = htmlspecialchars($userInfo['nom']);
            $poste_dresseur = htmlspecialchars($userInfo['poste_dresseur'] ?? null);
            $poste_portal = htmlspecialchars($userInfo['poste_portal'] ?? null);
            $poste_coiffeur = htmlspecialchars($userInfo['poste_coiffeur'] ?? null);
            $poste_developpeur =  htmlspecialchars($userInfo['poste_developpeur'] ?? null);
        }
        else {
            header("Location: login.php");
            exit;
        }

        // Afficher le message d'erreur ou de succès s'il est présent dans l'URL
        if (isset($_GET['error'])) {
            echo '<div class="box_error" id="box_error"><header>Erreur</header><div class="content">'.htmlspecialchars($_GET['error']).'</div></div>';
            echo '<script src="musique.js?v='.time().'"></script>';
            echo '<script>disparition();</script>';
        } 
        else if (isset($_GET['success'])) {
            echo '<div class="box_error" id="box_error"><header>Succès</header><div class="content">'.htmlspecialchars($_GET['success']).'</div></div>';
            echo '<script src="musique.js?v='.time().'"></script>';
            echo '<script>disparition();</script>';
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

    <div class="section">
        <div class="box_Poste">
            <div class="image-container2">
                <img src="image/Datadex.png" alt="Image du poste">
            </div>
            <div class="text-container">
                <div id="petitTexte1" class="petit-texte"></div>
                <div id="largeTexte1" class="large-texte"></div>
            </div>
            <?php if ($poste_dresseur == 1): ?>
                <div id="postule" class="postule"></div>
            <?php else: ?>
                <button onclick="window.location.href='poste_dresseur.php';" class="btn"><div class="poste1"></div></button>
            <?php endif;?>
        </div>

        <div class="box_Poste">
            <div class="image-container2">
                <img src="image/aperture.jpg" alt="Image du poste">
            </div>
            <div class="text-container">
                <div id="petitTexte2" class="petit-texte"></div>
                <div id="largeTexte2" class="large-texte"></div>
            </div>
            <?php if ($poste_portal == 1): ?>
                <div id="postule" class="postule"></div>
            <?php else: ?>
                <button onclick="window.location.href='poste_portal.php';" class="btn"><div class="poste1"></div></button>
            <?php endif;?>
        </div>

        <div class="box_Poste">
            <div class="image-container2">
                <img src="image/coiffure.png" alt="Image du poste">
            </div>
            <div class="text-container">
            <div id="petitTexte3" class="petit-texte"></div>
            <div id="largeTexte3" class="large-texte"></div>
            </div>
            <?php if ($poste_coiffeur == 1): ?>
                <div id="postule" class="postule"></div>
            <?php else: ?>
                <button onclick="window.location.href='poste_coiffeur.php';" class="btn"><div class="poste1"></div></button>
            <?php endif;?>
        </div>

        <div class="box_Poste">
            <div class="image-container2">
                <img src="image/informatique.png" alt="Image du poste">
            </div>
            <div class="text-container">
            <div id="petitTexte4" class="petit-texte"></div>
            <div id="largeTexte4" class="large-texte"></div>
            </div>
            <?php if ($poste_developpeur == 1): ?>
                <div id="postule" class="postule"></div>
            <?php else: ?>
                <button onclick="window.location.href='poste_developpeur.php';" class="btn"><div class="poste1"></div></button>
            <?php endif;?>
        </div>
    </div>
    <!-- Pied de page -->
    <footer>
        <p>&copy; <br></br></p>
    </footer>
</body>
</html>