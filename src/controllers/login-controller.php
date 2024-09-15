<?php
echo ("login-controller =>");
require_once 'src/model.php';

/* I - AFFICHAGE DE LA PAGE DE LOGIN */
function displayLoginPage()
{
    require("templates/login.php");
}

/* II - AUTHENTIFICATION UTILISATEUR */
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
            echo "Il semble que vous ne soyez pas encore inscrit";
            displayLoginPage();
            break;
        }
    }
}