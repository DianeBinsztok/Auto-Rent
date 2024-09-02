<?php
require_once('src/model.php');

// I - Authentification utilisateur
if ($owner) {
    $owner_id = $owner['id'];
    $locations = allLocations($owner_id);

} else {
    echo "Vous n'êtes pas encore inscrit";
}
require("templates/dashboard.php");

// II - Dashboard : afficher les biens à louer
function allLocations($owner_id)
{
    return getAllLocations($owner_id);
}