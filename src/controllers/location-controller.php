<?php
require_once('src/model.php');

// Afficher la page de détail d'un logement
function getLocationDetail($location_id)
{
    if ($location_id) {
        $location = getOneLocationDetail($location_id);
        require("templates/locationDetail.php");
    } else {
        echo "Impossible d'accéder aux informations sur ce logement";
    }

}
