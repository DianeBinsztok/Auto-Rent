<?php
require_once('src/model.php');

// Afficher la page de détail d'un logement

/* /!\ VEILLER À CE QUE L'UTILISATEUR NE PUISSE PAS ACCÉDER À UN LOGEMENT DE QUELQU'UN D'AUTRE */
if ($_GET["location"]) {
    $location_id = $_GET["location"];
    //Ici : vérifier que location_id fait bien partie des bien de l'utilisateur
    $location = getOneLocationDetail($_GET["location"]);
    require("templates/single-location.php");
} else {
    echo "Impossible d'accéder aux informations sur ce logement";
}