<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/edit.css?v=<?php echo time();?>"/>
    <title>Edition</title>
</head>
<body data-page="editPage">
    <?php
        session_start();
        include 'api.php';
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['email'])) {
            // Redirige vers la page de connexion si non connecté
            header("Location: login.php");
            exit;
        }

        // Afficher le message d'erreur ou de succès s'il est présent dans l'URL
        if (isset($_GET['error'])) {
            echo '<div class="box_error" id="box_error"><header>Erreur</header><div class="content">'.htmlspecialchars($_GET['error']).'</div></div>';

            // Fais disparaitre le message après 2.5 secondes
            echo '<script src="musique.js?v='.time().'"></script>';
            echo '<script>disparition();</script>';
        } else if (isset($_GET['success'])) {
            echo '<div class="box_error" id="box_error"><header>Succès</header><div class="content">'.htmlspecialchars($_GET['success']).'</div></div>';
            echo '<script src="musique.js?v='.time().'"></script>';
            echo '<script>disparition();</script>';
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
    <div class="special_header">
        <div class="image-container">
            <a><img onclick="window.location.href='test.php';" style="cursor: pointer;" src="image/logo_web_edited.png" alt="Image centrée en haut" class="centered-image"></a>
        </div>
    </div>

    <!-- Navigation -->
    <nav>
        <div class="box_profile"><span id="activeAccount"></span><?php echo "$prenom $nom";?></div>
        <a><button class="btn" id="langage"></button></a><script src="english_french.js?v=<?php echo time();?>"></script>
        <a><button class="btn" id="themeToggle"><img id="themeIcon" src="jour_logo.png" alt="Theme Icon">
        </button></a><script src="nuit_jour.js?v=<?php echo time();?>"></script> 
        <a href="logout.php"><button class="btn" id="logout"></button></a>
    </nav>
    <div class="container">
        <div class="box form-box">
            <header id="header1"></header>
            <form action="api.php" method="POST">
                <input type="hidden" name="action" value="modif_infos">
                <div class="field input">
                    <label id="nom" for="nom">Nom</label>
                    <input type="text" name="nom" id="nom">
                </div>

                <div class="field input">
                    <label id="prenom" for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom">
                </div>

                <div class="field input">
                    <label id="mdp" for="mdp">Mot de Passe</label>
                    <input type="password" name="mdp" id="mdp">
                </div>
                
                <div class="field">
                    <input id="enregistre" type="submit" class="btn" name="modif" value="">
                </div>
            </form>
        </div>
    </div>

    <!-- Bouton Supprimer le compte actif -->
    <form action="api.php" method="POST">
        <div>
            <input id="btn_supprimer" type="submit" class="btn_supprimer" name="supprimer" value="" required>
        </div>
    </form>

    <!-- Pied de page -->
    <footer>
        <div><p>&copy; </br></p></div>
    </footer>
</body>
</html>