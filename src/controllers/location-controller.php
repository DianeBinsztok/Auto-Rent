<?php
require_once('src/model.php');

// Afficher la page de détail d'un logement
if ($_GET["location"]) {
    $location_id = $_GET["location"];
    $location = getOneLocationDetail($_GET["location"]);
    if (locationBelongsToUser($location_id)) {
        require("templates/single-location.php");
    } else {
        header("Location:" . BASE_URL . "/dashboard");
    }
} else {
    echo "Impossible d'accéder aux informations sur ce logement";
}

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