<?php
// Dashboard: afficher tous les appels de loyer pour un utilisateur. Si l'utilisateur n'est pas identifié, renvoyer la page de login (pas sécure)
require "src/controllers/dashboard.php";

if (isset($_GET["user"]) && $_GET["user"] !== '') {
    allSheets($_GET["user"]);
} else {
    require "templates/login.php";
}

