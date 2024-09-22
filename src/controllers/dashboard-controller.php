<?php

/* AFFICHAGE DU TABLEAU DE BORD */
require_once('src/model.php');

// 1 - si une session est en cours : requêter les biens à louer de l'utilisateur et afficher son tableau de bord
if ($_SESSION) {
    $locations = getAllUserLocations($_SESSION["owner_id"]);
    require("templates/dashboard.php");
}

// 2 - si aucune donnée de session n'a été récupérée
else {
    echo ("session perdue ! =>");
    require("templates/login.php");
}


/* LISTER TOUS LES BIENS À LOUER DE L'UTILISATEUR */
function getAllUserLocations($owner_id)
{
    return getAllLocationsForOneUser($owner_id);
}
