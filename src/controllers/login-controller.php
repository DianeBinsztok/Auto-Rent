<?php
require $template;
require_once "src/model.php";
require_once "session-controller.php";

// TRAITER LES INFOS UTILISATEUR ENVOYÉES PAR LE TEMPLATE
if ($_POST["user_email"] && $_POST["user_password"]) {
    $owner = userIsAuthentified($_POST["user_email"], $_POST["user_password"]);
    if ($owner) {
        var_dump($owner);
        $_SESSION = createSession($owner["owner_id"], $owner["owner_email"]);
        header("Location:" . BASE_URL . "/dashboard");
        exit;

    } else {
        $_SESSION["message_color_code"] = "warning";
        $_SESSION["message"] = "Aucun compte n'a été trouvé avec vos identifiants.";
        header("Location:" . BASE_URL . "/login");
        exit;
    }
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
/*
function identifyUserAndCreateSession($user_email, $user_password)
{
    $owner = userIsAuthentified($user_email, $user_password);
    if ($owner) {
        var_dump($owner);
        createSession($owner["owner_id"], $owner["owner_email"]);
        return $_SESSION;
    }

    // 2.2 - Si aucune correspondance : renvoyer la page de login avec un message
    else {
        echo "Aucun compte n'a été trouvé avec vos identifiants.";
        $_SESSION["message_color_code"] = "warning";
        $_SESSION["message"] = "Aucun compte n'a été trouvé avec vos identifiants.";
        header("Location:" . BASE_URL . "/login");
    }
}
    */