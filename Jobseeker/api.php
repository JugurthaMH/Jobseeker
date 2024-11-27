<?php
// Détails de la connexion à la base de données
$host = 'localhost';
$dbname = 'test';
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si le formulaire a été soumis
    if (isset($_POST['submit'])) {
        // Récupération et sécurisation des données du formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        // Hachage du mot de passe
        //$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); 

        // Vérification si l'email existe déjà dans la base de données
        $verfifemail = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $pdo->prepare($verfifemail);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Redirige avec un message d'erreur si l'email est déjà utilisé
            header("Location: signup.php?error=".urlencode("Cet email est déjà utilisé. Veuillez en choisir un autre."));
            exit;
        }
        else {
            // Préparation de la requête d'insertion
            $sql = "INSERT INTO utilisateurs (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)";
            $stmt = $pdo->prepare($sql);

            // Liaison des valeurs aux paramètres
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mdp', $mdp);

            // Exécution de la requête
            if ($stmt->execute()) {
                // Redirection automatique vers test.php après une inscription réussie
                session_start();
                $_SESSION['email'] = $email;
                header("Location: test.php");
                exit;
            }
            else {
                header("Location: signup.php?error=".urlencode("Erreur lors de l'inscription."));
            }
        }
    }
    else if (isset($_POST['login'])) {
        // Récupération et sécurisation des données du formulaire
        $email = htmlspecialchars($_POST['email']);
        $mdp = $_POST['mdp'];

        // Préparation de la requête pour obtenir l'utilisateur avec l'email donné
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        
        // Exécution de la requête
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification si l'utilisateur existe et si le mot de passe est correct
        if ($user && $mdp == $user['mdp']) {
            // Cela redirige l'utilisateur vers la page d'accueil
            session_start();
            $_SESSION['email'] = $user['email'];
            header("Location: test.php");
            exit;
        }
        else {
            header("Location: login.php?error=".urlencode("Email ou mot de passe incorrect."));
        }
    }
    else if (isset($_POST['supprimer'])) {
        session_start();
        $email = $_SESSION['email'];
        
        // Suppression de la ligne dans la table "candidatures" associée à l'utilisateur
        $supprimer_Candidature = "DELETE FROM candidatures WHERE email_utilisateur = :email";
        $stmt = $pdo->prepare($supprimer_Candidature);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Suppression de la ligne dans la table "utilisateurs"
        $supprimer_utilisateur = "DELETE FROM utilisateurs WHERE email = :email";
        $stmt = $pdo->prepare($supprimer_utilisateur);
        $stmt->bindParam(':email', $email);
        
        // Redirige en fonction de la réussite de la suppression du compte
        if ($stmt->execute()) {
            session_destroy();
            header("Location: login.php");
        }
        else {
            header("Location: edit.php?error=".urlencode("Erreur lors de la suppression de l'utilisateur."));
        }
        exit;
    }
    else if (isset($_POST['modif'])) {
        session_start();
        // Récupération et sécurisation des données du formulaire
        $nom = htmlspecialchars($_POST['nom'] ?? null);
        $prenom = htmlspecialchars($_POST['prenom'] ?? null);
        $mdp = htmlspecialchars($_POST['mdp'] ?? null);
        $email = $_SESSION['email'];

        if ($_POST['mdp']=="")
        {
            $mdp = "null";
        }

        if ($_POST['nom']=="")
        {
            $nom = "null";
        }

        if ($_POST['prenom']=="")
        {
            $prenom = "null";
        }

        // Pour suivre le statut global de la mise à jour
        $update_mdp = 0;
        $update_nom = 0;
        $update_prenom = 0;

        // Mise à jour du mot de passe si nécessaire
        if ($mdp != "null") {
            $sql = "UPDATE utilisateurs SET mdp = :mdp WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':mdp', $mdp);
            $stmt->bindParam(':email', $email);
            $update_mdp = 1;
            if (!$stmt->execute()) {
                $update_mdp = 0;
            }
        }

        // Mise à jour du prénom si nécessaire
        if ($prenom != "null") {
            $sql = "UPDATE utilisateurs SET prenom = :prenom WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $update_prenom = 1;
            if (!$stmt->execute()) {
                $update_prenom = 0;
            }
        }

        // Mise à jour du nom si nécessaire
        if ($nom != "null") {
            $sql = "UPDATE utilisateurs SET nom = :nom WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $update_nom = 1;
            if (!$stmt->execute()) {
                $update_nom = 0;
            }
        }

        // Affiche un message selon le résultat de la mise à jour
        if ($update_mdp == 1 || $update_nom == 1 || $update_prenom == 1) {
            header("Location: edit.php?success=".urlencode("Mise à jour réussie."));
        }
        else{
            header("Location: edit.php?error=".urlencode("Erreur lors de la mise à jour. Aucune modification n'a été faite."));
        }
    }
    else if (isset($_POST['postuler'])) {
        session_start();
        $email = $_SESSION['email']; // Email de l'utilisateur connecté
        $poste = $_POST['poste']; // Récupère l'identifiant du poste

        // Vérifie si l'utilisateur a déjà une candidature dans la base
        $stmt = $pdo->prepare("SELECT * FROM candidatures WHERE email_utilisateur = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $deja_candidate = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($deja_candidate) {
            // Mise à jour si l'utilisateur a déjà postulé
            $stmt = $pdo->prepare("UPDATE candidatures SET $poste = 1 WHERE email_utilisateur = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            header("Location: test.php?success=".urlencode("Candidature enregistrée avec succès."));
        } else {
            // Insertion si c'est la première candidature de l'utilisateur
            $stmt = $pdo->prepare("INSERT INTO candidatures (email_utilisateur, $poste) VALUES (:email, 1)");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            header("Location: test.php?success=".urlencode("Candidature enregistrée avec succès pour la première fois."));
        }
        exit;
    }

    // Fonction qui sert aux pages à récupérer les infos de l'utilisateur actuel
    function get_infos($email) {
        global $pdo;
    
        // Requête SQL avec jointure entre utilisateurs et candidatures
        $sql = "SELECT u.prenom, u.nom, c.poste_dresseur, c.poste_portal, c.poste_coiffeur, c.poste_developpeur
        FROM utilisateurs u LEFT JOIN candidatures c ON u.email = c.email_utilisateur WHERE u.email = :email";

        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>