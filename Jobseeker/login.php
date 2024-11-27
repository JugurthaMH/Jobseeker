<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login_signup.css?v=<?php echo time(); ?>"/>
    <title>Connexion</title>
</head>
<body data-page="loginPage">
    <!-- Rend les 2 boutons indiscernables MAIS leur code javascript est toujours actif -->
    <script id="langage" src="english_french.js?v=<?php echo time();?>"></script>
    <button id="themeToggle"><img id="themeIcon" src="jour_logo.png" alt="Theme Icon"></button><script src="nuit_jour.js?v=<?php echo time();?>"></script>
    <?php
        // Afficher le message d'erreur si présent dans l'URL
        if (isset($_GET['error'])) {
            echo '<div class="box_error" id="box_error"><header>Erreur</header><div class="content">'.htmlspecialchars($_GET['error']).'</div></div>';

            // Fais disparaitre le message après 2.5 secondes
            echo '<script src="musique.js?v='.time().'"></script>';
            echo '<script>disparition();</script>';
        }
    ?>
    <!-- En-tête du site -->
    <div class="image-container">
        <img src="image/logo_web_edited.png" alt="Image centrée en haut" class="centered-image">
    </div>
    <!-- Contenu principal -->
    <div class="container">
        <div class="box form-box">
            <header id="connexion"></header>
            <form action="api.php" method="POST">
                <div class="field input">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label id="mdp" for="mdp"></label>
                    <input type="password" name="mdp" id="mdp" required>
                </div>
                <div class="field">
                    <input id="btn_connexion" type="submit" class="btn" name="login" value="" required>
                </div>
                <div class="links">
                    <span id="message1"></span><a href="signup.php"><span id="message2"></span></a>
                </div>
            </form>
        </div>
    </div>
    <!-- Pied de page -->
    <footer>
        <p>&copy; <br></br></p>
    </footer>
</body>
</html>