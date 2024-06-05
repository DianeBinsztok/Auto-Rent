<?php
// Connexion à la base de données
require "env.php";
try {
    $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
    $statement = $database->query(
        "SELECT * FROM `sheets` LIMIT 50"
    );

    $getAllSheets = $statement->fetchAll();
} catch (Exception $e) {
    echo ("Impossible d'accéder aux appels de loyers");
    die('Erreur : ' . $e->getMessage());
}