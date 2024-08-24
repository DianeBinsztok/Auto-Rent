<?php
require_once 'src/model.php';

/* Vérifier les identifiants utilisateurs */
function userAuth()
{
    // 1 - Récupérer tous les utilisateurs inscrits
    $usersList = getAllUsers();

    // 2 - Récupérer les données de $_POST et chercher une correspondance dans $usersList 
    if ($_POST["user_email"] && $_POST["user_password"]) {

        foreach ($usersList as $user) {
            if ($user['email'] == $_POST["user_email"] && $user['password'] == $_POST["user_password"]) {
                echo "Utilisateur authentifié avec succès";
                if ($user['owner_id'] && $user['tenant_id']) {
                    echo "Vous êtes à la fois propriétaire et locataire";
                } else {
                    if ($user['owner_id']) {
                        echo "Vous êtes propriétaire";
                    } elseif ($user['tenant_id']) {
                        echo "Vous êtes locataire";
                    } else {
                        echo "Vous n'êtes ni propriétaire ni locataire";
                    }
                }
                require('dashboard-controller.php');
                allSheets($user['owner_id']);
            } else {
                echo "Il semble que vous ne soyez pas encore inscrit";
                break;
            }
        }
    }
}

