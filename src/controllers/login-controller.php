<?php
require "templates/login.php";
require_once 'src/model.php';

// RÉCUPÉRER LES INFOS DE L'UTILISATEUR
if ($_POST["user_email"] && $_POST["user_password"]) {
    $_SESSION = identifyUserAndCreateSession($_POST["user_email"], $_POST["user_password"]);
    header("Location:" . BASE_URL . "/dashboard");
    exit;
}

// AUTHENTIFICATION UTILISATEUR
function userIsAuthentified($user_email, $user_password)
{
    // 1 - Récupérer tous les utilisateurs inscrits
    $ownersList = getAllOwners();

    // 2 - Chercher une correspondance avec les données de l'utilisateur récupérées en $_POST
    foreach ($ownersList as $owner) {
        // Si on trouve une correspondance : créer une session utilisateur
        if ($owner['owner_email'] == $user_email && $owner['owner_password'] == $user_password) {
            return $owner;
        }
        // Sinon : retourner false par défaut
        return false;
    }
}

// SI L'UTILISATEUR EST AUTHENTIFIÉ : CRÉER UNE SESSION AVEC SES DONNÉES
function identifyUserAndCreateSession($user_email, $user_password)
{
    $owner = userIsAuthentified($user_email, $user_password);
    if ($owner) {

        session_start();
        $_SESSION["session_id"] = session_id();
        $_SESSION["owner_id"] = $owner['owner_id'];
        $_SESSION["owner_email"] = $owner['owner_email'];
        return $_SESSION;
    }

    // 2.2 - Si aucune correspondance : renvoyer la page de login avec un message
    else {
        $_SESSION["message"] = "Veuillez saisir votre email et votre mot de passe";
        header("Location:" . BASE_URL . "/login");
    }
}