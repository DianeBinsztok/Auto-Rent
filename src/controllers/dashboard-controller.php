<?php
echo ("dashboard controller =>");
require_once('src/model.php');

/* I - AFFICHAGE DU TABLEAU DE BORD */
function displayDashboardPage()
{
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

}
/* II - LISTER TOUS LES BIENS À LOUER DE L'UTILISATEUR */
function getAllUserLocations($owner_id)
{
    return getAllLocations($owner_id);
}
