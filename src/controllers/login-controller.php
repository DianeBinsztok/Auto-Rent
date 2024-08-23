<?php
require_once 'src/model.php';

/* Vérifier les identifiants utilisateurs */
function userAuth()
{
    // 1 - Récupérer tous les utilisateurs inscrits
    $usersList = getAllUsers();

    // 2 - Récupérer les données de $_POST et chercher une correspondance dans $usersList 
    if ($_POST["user_email"] && $_POST["user_password"]) {
        //var_dump($_POST["user_email"]);
        //var_dump($_POST["user_password"]);

        foreach ($usersList as $user) {
            if ($user['email'] == $_POST["user_email"] && $user['password'] == $_POST["user_password"]) {
                echo "Utilisateur authentifié avec succès";
                break;
            } else {
                echo "Il semble que vous ne soyez pas encore inscrit";
                break;
            }
        }
    }
}

