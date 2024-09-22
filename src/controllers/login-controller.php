<?php
require "templates/login.php";
require_once 'src/model.php';

//RÉCUPÉRER LES INFOS DE L'UTILISATEUR
if ($_POST["user_email"] && $_POST["user_password"]) {
    $_SESSION = identifyUserAndCreateSession($_POST["user_email"], $_POST["user_password"]);
    exit;
}

//AUTHENTIFICATION UTILISATEUR
function identifyUserAndCreateSession($user_email, $user_password)
{

    // 1 - Récupérer tous les utilisateurs inscrits
    $ownersList = getAllOwners();

    // 2 - Chercher une correspondance avec les données de l'utilisateur récupérées en $_POST
    foreach ($ownersList as $owner) {

        // 2.1 - Si on trouve une correspondance : créer une session utilisateur
        if ($owner['email'] == $user_email && $owner['password'] == $user_password) {

            session_start();
            $_SESSION["session_id"] = session_id();
            $_SESSION["owner_id"] = $owner['id'];
            $_SESSION["owner_email"] = $owner['email'];
            return $_SESSION;
        }

        // 2.2 - Si aucune correspondance : renvoyer la page de login avec un message
        else {
            header("Location: login");
        }
    }
}