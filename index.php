<?php
// LOGIN
require "src/controllers/login-controller.php";
if ($_POST["user_email"] && $_POST["user_password"]) {
    userAuth();
} else {
    require "templates/login.php";
}


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