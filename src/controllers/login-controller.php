<?php
require_once 'src/model.php';

/* Vérifier les identifiants utilisateurs */
function userAuth()
{
    // 1 - Récupérer tous les utilisateurs inscrits
    $ownersList = getAllOwners();

    // 2 - Récupérer les données de $_POST et chercher une correspondance dans $usersList 
    if ($_POST["user_email"] && $_POST["user_password"]) {

        foreach ($ownersList as $owner) {
            if ($owner['email'] == $_POST["user_email"] && $owner['password'] == $_POST["user_password"]) {
                echo "Utilisateur authentifié avec succès";
                require('dashboard-controller.php');
                break;
            } else {
                echo "Il semble que vous ne soyez pas encore inscrit";
                break;
            }
        }
    }
}

