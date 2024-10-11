<?php
require $template;
require_once "src/model.php";
require "session-controller.php";

// SI LE FORMULAIRE EST ENVOYÉ: VÉRIFIER LES INFORMATIONS AVANT DE CRÉER L'UTILISTEUR
if ($_POST) {


    // Chercher les erreurs
    $errors = checkNewUserRegistration($_POST);

    // Si le tableau d'erreurs est vide : créer un nouvel utilisateur
    if (!$errors) {

        //PUT une nouvelle ligne dans la table 'owners'
        $newOwnerData["owner_name"] = $_POST["new_user_name"];
        $newOwnerData["owner_email"] = $_POST["new_user_email"];
        $newOwnerData["owner_password"] = $_POST["new_user_password"];
        $newOwnerId = createNewOwner($newOwnerData);

        if ($newOwnerId) {
            $_SESSION = createSession($newOwnerId, $newOwnerData["owner_email"]);

            if ($_SESSION) {
                $_SESSION["message"] = "Bienvenue sur votre dashboard!";
                header("Location:" . BASE_URL . "/dashboard");
                exit;
            } else {
                $_SESSION["message"] = "Une erreur est survenue, la session utilisateur n'a pas pu être créée";
                header("Location:" . BASE_URL . "/register");
                exit;
            }

        } else {
            $_SESSION["message"] = "Une erreur est survenue, votre compte n'a pas pu être créé";
            header("Location:" . BASE_URL . "/register");
            exit;
        }

    }
    // Sinon : afficher les erreurs
    else {
        $_SESSION["message"] = "<p>Votre compte n'a pas pu être créé :</p><ul>";

        foreach ($errors as $error) {
            $_SESSION["message"] .= "<li>" . $error . "</li>";
        }
        $_SESSION["message"] .= "</ul>";
        header("Location:" . BASE_URL . "/register");
        exit;
    }
}


// VÉRIFIER LES INFORMATIONS ENVOYÉES ET RENVOYER LES ERREURS
function checkNewUserRegistration($post)
{
    $errors = array();
    // I - Si des champs ne sont pas renseignés
    if (!allFieldsAreFilled($post)) {
        $errors[] = "Veuillez renseigner tous les champs pour vous enregistrer";
    }
    // II - Si un compte existe déjà avec l'email renseigné
    if (!userIsNew($post["new_user_email"])) {
        $errors[] = "Un compte existe déjà pour cette adresse email";
    }
    // III - Si le format d'email n'est pas valide
    if (!emailIsValid($post["new_user_email"])) {
        $errors[] = "Veuillez renseigner une adresse email au bon format. Ex: nom@email.com";
    }
    // IV - Si le mot de passe est trop court
    if (!passwordIsLongEnough($_POST["new_user_password"])) {
        $errors[] = "Votre mot de passe doit avoir au moins 8 caractères";
    }
    // V - Si le mot de passe et la confirmation de mp ne correspondent pas
    if (!pwAndPwConfirmationMatch($post["new_user_password"], $post["confirm_password"])) {
        $errors[] = "Assurez-vous d'avoir bien saisi deux fois le même mot de passe";
    }

    return $errors;
}

// I - VÉRIFIER QUE TOUS LES CHAMPS SONT RENSEIGNÉS
function allFieldsAreFilled($post)
{
    if ($post["new_user_name"] && $post["new_user_email"] && $post["new_user_password"] && $post["confirm_password"]) {
        return true;
    }
    return false;
}

// II - VÉRIFIER QUE L'ADRESSE EMAIL N'EST PAS DÉJÀ UTILISÉE
function userIsNew($user_email)
{
    // 1 - Récupérer tous les utilisateurs inscrits
    $ownersList = getAllOwners();

    // 2 - Chercher une correspondance avec les données de l'utilisateur récupérées en $_POST
    foreach ($ownersList as $owner) {

        // 2.1 - Si on trouve une correspondance : renvoyer un message d'erreur
        if ($owner['owner_email'] == $user_email) {
            return false;
        }
        // 2.2 - Sinon : retourner true
        return true;
    }
}

// III - VÉRIFIER QUE L'ADRESSE EMAIL A UN FORMAT VALIDE
function emailIsValid($user_email)
{
    if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

// IV - VÉRIFIER QUE LE MOT DE PASSE EST ASSEZ LONG  
function passwordIsLongEnough($user_password)
{
    if (strlen($user_password) >= 8) {
        return true;
    }
    return false;
}

// V - VÉRIFIER QUE LE MOT DE PASSE EST ASSEZ LONG  
function pwAndPwConfirmationMatch($user_password, $password_confirmation)
{
    if ($user_password == $password_confirmation) {
        return true;
    }
    return false;
}