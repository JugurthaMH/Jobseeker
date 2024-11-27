<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php"); // Redirige vers la page de connexion après la déconnexion
    exit;
?>
