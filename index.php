<?php
session_start();

define("BASE_URL", dirname($_SERVER['SCRIPT_NAME']));
//Ne garder que la requête: après le nom de domaine et avant la query string (sur une route dynamique)
define("REQUESTED_URI", str_replace(BASE_URL, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

$routes = [
    "/" => ["restricted" => false, "controller" => "src/controllers/homepage-controller.php", "template" => "templates/homepage.php", "mTitle" => "Autorent", "mDesc" => "Bienvenue sur Autorent", "stylesheet" => "/assets/stylesheets/specific-styles/homepage-style.css"],

    "/accueil" => ["restricted" => false, "controller" => "src/controllers/homepage-controller.php", "template" => "templates/homepage.php", "mTitle" => "Autorent", "mDesc" => "Bienvenue sur Autorent", "stylesheet" => "/assets/stylesheets/specific-styles/homepage-style.css"],

    "/home" => ["restricted" => false, "controller" => "src/controllers/homepage-controller.php", "template" => "templates/homepage.php", "mTitle" => "Autorent", "mDesc" => "Bienvenue sur Autorent"],
    "stylesheet" => "/assets/stylesheets/specific-styles/homepage-style.css",

    "/login" => ["restricted" => false, "controller" => "src/controllers/login-controller.php", "template" => "templates/login.php", "mTitle" => "Identifiez-vous - Autorent", "mDesc" => "Identifiez-vous ou enregistrez-vous", "stylesheet" => "/assets/stylesheets/specific-styles/login-register-style.css"],

    "/register" => ["restricted" => false, "controller" => "src/controllers/register-controller.php", "template" => "templates/register.php", "mTitle" => "Enregistrez-vous - Autorent", "mDesc" => "Enregistrez-vous", "stylesheet" => "/assets/stylesheets/specific-styles/login-register-style.css"],

    "/404" => ["restricted" => false, "controller" => "src/controllers/404-controller.php", "template" => "templates/404.php", "mTitle" => "Autorent", "mDesc" => "Bienvenue sur Autorent", "stylesheet" => "/assets/stylesheets/specific-styles/404-style.css"],

    // Pages réservées au utilisateurs identifiés
    "/dashboard" => ["restricted" => true, "controller" => "src/controllers/location-controller.php", "template" => "templates/dashboard.php", "mTitle" => "Tableau de bord - Autorent", "mDesc" => "Votre tableau de bord", "stylesheet" => "/assets/stylesheets/specific-styles/dashboard-style.css"],

    "/dashboard/user" => ["restricted" => true, "controller" => "src/controllers/user-controller.php", "template" => "templates/user.php", "mTitle" => "Mon profil - Autorent", "mDesc" => "Mon profil utilisateur", "stylesheet" => "/assets/stylesheets/specific-styles/user-style.css"],

    "/dashboard/new-location" => ["restricted" => true, "controller" => "src/controllers/location-controller.php", "template" => "templates/new-location.php", "mTitle" => "Enregistrer un bien - Autorent", "mDesc" => "Enregistrez un bien à louer", "stylesheet" => "/assets/stylesheets/specific-styles/new-location-style.css"],

    // Route dynamique
    "/dashboard/location" => ["restricted" => true, "controller" => "src/controllers/location-controller.php", "template" => "templates/single-location.php", "mTitle" => "Mon bien à louer - Autorent", "mDesc" => "Mon bien à louer", "stylesheet" => "/assets/stylesheets/specific-styles/single-location-style.css"],
];


if (array_key_exists(REQUESTED_URI, $routes)) {


    $request_uri = $routes[REQUESTED_URI];
    $template = $request_uri["template"];
    $metaDescription = $request_uri["mDesc"];
    $metaTitle = $request_uri["mTitle"];
    $specificStylesheet = $request_uri["stylesheet"];

    if ($request_uri["restricted"]) {

        // POUR LES ROUTES RÉSERVÉES AUX UTILISATEURS IDENTIFIÉS
        require "src/middlewares/authentification-mw.php";
        authMiddleware();
    }

    require $request_uri["controller"];

} else {
    header("Location:" . BASE_URL . "/404");
    exit;
}
