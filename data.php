<?php
// Connexion à la base de données autorent.
require "./env.php";
try {
    $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
    $statement = $database->query(
        "SELECT * FROM sheets"
    );
    $sheets = $statement->fetch();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}