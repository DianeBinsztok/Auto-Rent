<?php
require_once 'src/model.php';

/* AUTHENTIFICATION UTILISATEUR */
function userAuth()
{
    // 1 - Récupérer tous les utilisateurs inscrits
    $ownersList = getAllOwners();

    // 2 - Récupérer les données de $_POST et chercher une correspondance dans $ownersList 
    if ($_POST["user_email"] && $_POST["user_password"]) {

        foreach ($ownersList as $owner) {

            if ($owner['email'] == $_POST["user_email"] && $owner['password'] == $_POST["user_password"]) {
                $owner_id = $owner['id'];

                //a - Aller chercher la fonction allLocations dans dashboard-controller pour récupérer la listes des logements de l'utilisateur
                require('dashboard-controller.php');
                $locations = allLocations($owner_id);

                //b - Afficher le tableau de bord avec les logements récupérés
                require("templates/dashboard.php");
                break;

            } else {
                echo "Il semble que vous ne soyez pas encore inscrit";
                break;
            }
        }
    }
}

