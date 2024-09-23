<?php
session_start();

define("BASE_URL", dirname($_SERVER['SCRIPT_NAME']));
define("REQUESTED_URI", str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']));

$routes = [
    "/" => ["restricted" => false, "controller" => "src/controllers/homepage-controller.php", "template" => "templates/homepage.php", "mTitle" => "Autorent", "mDesc" => "Bienvenue sur Autorent", "stylesheet" => "/assets/stylesheets/specific-styles/homepage-style.css"],

    "/accueil" => ["restricted" => false, "controller" => "src/controllers/homepage-controller.php", "template" => "templates/homepage.php", "mTitle" => "Autorent", "mDesc" => "Bienvenue sur Autorent", "stylesheet" => "/assets/stylesheets/specific-styles/homepage-style.css"],

    "/home" => ["restricted" => false, "controller" => "src/controllers/homepage-controller.php", "template" => "templates/homepage.php", "mTitle" => "Autorent", "mDesc" => "Bienvenue sur Autorent"],
    "stylesheet" => "/assets/stylesheets/specific-styles/homepage-style.css",

    "/login" => ["restricted" => false, "controller" => "src/controllers/login-controller.php", "template" => "templates/login.php", "mTitle" => "Identifiez-vous - Autorent", "mDesc" => "Identifiez-vous ou enregistrez-vous", "stylesheet" => "/assets/stylesheets/specific-styles/login-register-style.css"],

    "/404" => ["restricted" => false, "controller" => "src/controllers/404-controller.php", "template" => "templates/404.php", "mTitle" => "Autorent", "mDesc" => "Bienvenue sur Autorent", "stylesheet" => "/assets/stylesheets/specific-styles/404-style.css"],

    // Pages réservées au utilisateurs identifiés
    "/dashboard" => ["restricted" => true, "controller" => "src/controllers/dashboard-controller.php", "template" => "templates/dashboard.php", "mTitle" => "Tableau de bord - Autorent", "mDesc" => "Votre tableau de bord", "stylesheet" => "/assets/stylesheets/specific-styles/dashboard-style.css"],

    "/dashboard/user" => ["restricted" => true, "controller" => "src/controllers/user-controller.php", "file" => "templates/user.php", "mTitle" => "Mon profil - Autorent", "mDesc" => "Mon profil utilisateur", "stylesheet" => "/assets/stylesheets/specific-styles/user-style.css"],

    "/dashboard/new-location" => ["restricted" => true, "controller" => "src/controllers/new-location-controller.php", "file" => "templates/new-location.php", "mTitle" => "Enregistrer un bien - Autorent", "mDesc" => "Enregistrez un bien à louer", "stylesheet" => "/assets/stylesheets/specific-styles/new-location-style.css"],
];


if (array_key_exists(REQUESTED_URI, $routes)) {

    $request_uri = $routes[REQUESTED_URI];
    $metaDescription = $request_uri["mDesc"];
    $metaTitle = $request_uri["mTitle"];
    $specificStylesheet = $request_uri["stylesheet"];

    if ($request_uri["restricted"]) {

        // POUR LES ROUTES RÉSERVÉES AUX UTILISATEURS IDENTIFIÉS
        require "src/middlewares/authentification-mw.php";
        authMiddleware();
        require $request_uri["controller"];

    } else {
        // POUR LES AUTRES ROUTES
        require $request_uri["controller"];
    }

} else if ($_GET["location"]) {
    require "src/controllers/location-controller.php";
} else {
    header("Location:" . BASE_URL . "/404");
    exit;
}
