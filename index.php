<?php
/* https://www.freecodecamp.org/news/how-to-build-a-routing-system-in-php/ */
/* https://craftcms.com/knowledge-base/removing-index-php-from-urls */
//session_start();
echo "index =>";
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']) . "/");

$publicPages = ["", "accueil", "about", "contact", "login"];

if (in_array(str_replace(BASE_URL, "", $_SERVER['REQUEST_URI']), $publicPages)) {
    switch ($_SERVER['REQUEST_URI']) {

        case BASE_URL:
            echo ("Page d'accueil =>");
            break;

        case BASE_URL . "accueil":
            header("Location:" . BASE_URL);
            echo ("Page d'accueil =>");
            break;

        case BASE_URL . "about":
            echo ("Page about =>");
            break;

        case BASE_URL . "contact":
            echo ("Page de contact =>");
            break;

        case BASE_URL . "login":
            echo ("login =>");
            require "src/controllers/login-controller.php";
            displayLoginPage();
            break;

        default:
            header("Location: error");
            echo ("Aucune page sur cette URL =>");
            var_dump($_SERVER['REQUEST_URI']);
            http_response_code(404);
            break;
    }
} else {
    if ($_SESSION) {

        if ($_GET["location"]) {
            echo "Page du bien à louer / en location";
        } else {
            switch ($_SERVER['REQUEST_URI']) {

                case BASE_URL:
                case BASE_URL . "index.php":
                case BASE_URL . "index":
                case BASE_URL . "home":
                    header("Location: dashboard");
                    exit;


                case BASE_URL . "dashboard":
                    echo ("Page d'accueil/dashboard =>");
                    require "src/controllers/dashboard-controller.php";
                    displayDashboardPage();
                    break;

                case BASE_URL . "dashboard/user":
                    echo ("Page de profil utilisateur =>");
                    break;

                default:
                    header("Location: error");
                    echo ("Aucune page sur cette URL =>");
                    var_dump($_SERVER['REQUEST_URI']);
                    http_response_code(404);
                    break;
            }

        }

    }
    // SINON : RECUPÉRER LES INFOS DU VISITEUR EN POST
    else if ($_POST["user_email"] && $_POST["user_password"]) {
        require "src/controllers/login-controller.php";
        $_SESSION = identifyUserAndCreateSession($_POST["user_email"], $_POST["user_password"]);
        header("Location: dashboard");
        exit;
    }
    // SINON : LOGIN
    else {
        require "src/controllers/login-controller.php";
        displayLoginPage();
        exit;
    }
}



/*
$request_uri = str_replace(dirname($_SERVER['SCRIPT_NAME']), "", $_SERVER['REQUEST_URI']);
;
var_dump($request_uri);

switch ($_SERVER['REQUEST_URI']) {

    // LES PAGES PUBLIQUES
    case BASE_URL:
    case BASE_URL . "index.php":
    case BASE_URL . "home":
        echo "Page d'accueil";
        break;

    case BASE_URL . "login":
        echo "Page de connexion";
        require "templates/login.php";
        break;

    case BASE_URL . "contact":
        echo "Page de contact";
        break;

    case BASE_URL . "a-propos":
        echo "Page de présentation";
        break;
    default:
        echo ("Aucune page sur cette URL =>");
        var_dump($_SERVER['REQUEST_URI']);
        http_response_code(404);
        break;

    // LES PAGES QUI REQUIÈRENT UNE SESSION ACTIVE
    case BASE_URL . "dashboard":
        if ($_SESSION) {
            echo "2 - Une session est en cours";
            if ($_GET["location"]) {
                echo "Page de location";
            } else {
                require "src/controllers/dashboard-controller.php";
                displayDashboardPage();
            }




        } else if ($_POST["user_email"] && $_POST["user_password"]) {
            require "src/controllers/login-controller.php";
            $_SESSION = identifyUserAndCreateSession($_POST["user_email"], $_POST["user_password"]);
            echo "1 - Une session a été créée";

            if (isset($_SESSION['owner_id'])) {
                require "index.php";
            } else {
                echo ("echec de la connexion");
            }

        } else {
            header("Location: login");
        }
        break;
    case BASE_URL . "dashboard/user":
        if ($_SESSION) {
            echo "Page de profil";
        } else if ($_POST["user_email"] && $_POST["user_password"]) {
            require "src/controllers/login-controller.php";
            $_SESSION = identifyUserAndCreateSession($_POST["user_email"], $_POST["user_password"]);

            if (isset($_SESSION['owner_id'])) {
                require "index.php";
            } else {
                echo ("echec de la connexion");
            }

        } else {
            header("Location: login");
            exit;
        }
}
*/

/* INVERSER L'ORDRE DES VÉRIFICATIONS : 
1 - Tester les URL dans le switch case
2 - Dans chaque URL : tester si une session est active ou pas
*/

/*
switch ($_SERVER['REQUEST_URI']) {

    case BASE_URL:
    case BASE_URL . "index.php":
    case BASE_URL . "dashboard":
        if ($_SESSION) {
            echo ("Page d'accueil/dashboard =>");
            require "src/controllers/dashboard-controller.php";
            displayDashboardPage();

        } else if ($_POST["user_email"] && $_POST["user_password"]) {
            require "src/controllers/login-controller.php";
            $_SESSION = identifyUserAndCreateSession($_POST["user_email"], $_POST["user_password"]);

            if (isset($_SESSION['owner_id'])) {
                require "index.php";
            } else {
                echo ("echec de la connexion");
            }

        } else {
            require "src/controllers/login-controller.php";
            displayLoginPage();
        }

        break;

    case BASE_URL . "login":
        require "templates/login.php";
        break;

    default:
        echo ("Aucune page sur cette URL =>");
        var_dump($_SERVER['REQUEST_URI']);
        http_response_code(404);
        break;
}
*/



/*
// SI SESSION EN COURS
if ($_SESSION) {
    echo ("SESSION EN PLACE");
    require('dashboard-controller.php');
    $locations = allLocations($_SESSION["owner_id"]);

    // Location detail
    if (isset($_GET["location"]) && $_GET["location"] !== '') {
        require "src/controllers/location-controller.php";
        getLocationDetail($_GET["location"]);
    }

}
// SINON : RECUPÉRER LES INFOS DU VISITEUR EN POST
else if ($_POST["user_email"] && $_POST["user_password"]) {
    require "src/controllers/login-controller.php";
    userAuth();
}
// SINON : LOGIN
else {
    require "templates/login.php";
}
*/

/*
switch ($_SERVER['REQUEST_URI']) {

    case BASE_URL || BASE_URL . "index.php":
        echo ("Page d'accueil =>");

        if ($_SESSION) {
            require(__DIR__ . "/templates/dashboard.php");
        } else if ($_POST["user_email"] && $_POST["user_password"]) {
            require(__DIR__ . "/src/controllers/login-controller.php");
            userAuth();
        } else {
            require(__DIR__ . "/templates/login.php");
        }
        break;

    case BASE_URL . "dashboard":
        echo ("dashboard =>");
        require(__DIR__ . "/src/controllers/dashboard-controller.php");
        break;

    case BASE_URL . "location":
        require(__DIR__ . "/src/controllers/location-controller.php");
        break;
    default:
        echo ("Cette URL n'existe pas =>");
        var_dump($_SERVER['REQUEST_URI']);
        http_response_code(404);
}
*/

/*
require "src/controllers/login-controller.php";
if ($_POST["user_email"] && $_POST["user_password"]) {
    userAuth();
} else if ($_SESSION) {
    //a - Aller chercher la fonction allLocations dans dashboard-controller pour récupérer la listes des logements de l'utilisateur
    require('dashboard-controller.php');
    $locations = allLocations($_SESSION["owner_id"]);

    //b - Afficher le tableau de bord avec les logements récupérés
    require("templates/dashboard.php");
} else {
    require "templates/login.php";
}

// LOCATION DETAIL
if (isset($_GET["location"]) && $_GET["location"] !== '') {
    require "src/controllers/location-controller.php";
    getLocationDetail($_GET["location"]);
}
*/

/*
// LOGIN
require "src/controllers/login-controller.php";

if ($_SESSION) {
    echo ("SESSION EN PLACE");
    // DASHBOARD : ALL LOCATIONS
    require('dashboard-controller.php');
    $locations = allLocations($_SESSION["owner_id"]);

    // LOCATION DETAIL
    if (isset($_GET["location"]) && $_GET["location"] !== '') {
        require "src/controllers/location-controller.php";
        getLocationDetail($_GET["location"]);
    }

} else if ($_POST["user_email"] && $_POST["user_password"]) {
    userAuth();
} else {
    require "templates/login.php";
}
*/





/*
// Dashboard: afficher tous les appels de loyer pour un utilisateur. Si l'utilisateur n'est pas identifié, renvoyer la page de login (pas sécure)
require "src/controllers/dashboard.php";

//Pour un appel de loyer
require "src/controllers/sheet.php";


//Pour un nouvel appel de loyer

require "src/controllers/new-sheet.php";

if (isset($_GET["user"]) && $_GET["user"] !== '') {
    if (isset($_GET["sheet"]) && $_GET["sheet"] !== '') {
        sheetDetail($_GET["sheet"]);
    } else if (isset($_GET["action"]) && $_GET["action"] == "new") {
        //getLastSheetToCreateNew();
        askForTenantBeforeGetLastSheetToCreateNew();
    } else {
        allSheets($_GET["user"]);
    }

} else {
    require "templates/login.php";
}
*/