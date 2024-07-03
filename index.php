<?php
//Librairie FPDF : pour exporter l'appel de loyer en PDF
require "fpdf/fpdf.php";

// Dashboard: afficher tous les appels de loyer pour un utilisateur. Si l'utilisateur n'est pas identifié, renvoyer la page de login (pas sécure)
require "src/controllers/dashboard.php";

//Pour un appel de loyer
require "src/controllers/sheet.php";

if (isset($_GET["user"]) && $_GET["user"] !== '') {
    if (isset($_GET["sheet"]) && $_GET["sheet"] !== '') {
        sheetDetail($_GET["sheet"]);
    } else {
        allSheets($_GET["user"]);
    }
} else {
    require "templates/login.php";
}





