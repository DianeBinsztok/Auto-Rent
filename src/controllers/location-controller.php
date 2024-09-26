<?php
require_once('src/model.php');

/* APPELER LES FONCTIONS SELON LE TEMPLATE DEMANDÉ */
switch ($template) {

    // I - DASHBOARD : tous les logements de l'utilisateur
    case 'templates/dashboard.php':
        $locations = getAllUserLocations($_SESSION["owner_id"]);
        require $template;
        break;

    // II - SINGLE : consulter un logement en particulier
    case 'templates/single-location.php':

        if ($_GET["location"]) {
            $location = getDetailsOnRequiredLocation($_GET["location"]);
            require $template;
            break;
        } else {
            $_SESSION["message"] = "Une erreur est survenue : aucun identifiant de logement n'a été détecté";
            header("Location:" . BASE_URL . "/dashboard");
        }

    // III - NEW LOCATION : enregistrer un nouveau logement
    case 'templates/new-location.php':
        require $template;
        break;

    // AUTRE
    default:
        require "templates/404.php";
}


/* LES FONCTIONS */

// I - DASHBOARD : afficher tous les logements de l'utilisateur
function getAllUserLocations($owner_id)
{
    return getAllLocationsForOneUser($owner_id);
}


// II - SINGLE : consulter un logement en particulier
// II-1 - Vérifier qu'un logement appartient bien à l'utilisateur qui le demande
function locationBelongsToUser($location_id)
{
    if ($_SESSION["owner_id"]) {

        $usersLocations = getAllLocationsForOneUser($_SESSION["owner_id"]);
        foreach ($usersLocations as $location) {
            if ($location["id"] == $location_id) {
                return true;
            }
        }
        return false;
    } else {
        header("Location:/login");
    }
}
// II-1 - Renvoyer les informations sur un logement
function getDetailsOnRequiredLocation($location_id)
{
    if (locationBelongsToUser($location_id)) {
        $location = getOneLocationDetail($_GET["location"]);
        return $location;
    } else {
        $_SESSION["message"] = "Vous ne pouvez pas accéder à ce logement";
        header("Location:" . BASE_URL . "/dashboard");
    }
}
