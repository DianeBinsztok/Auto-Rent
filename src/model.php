<?php

//Afficher tous les appels de loyer
function getAllSheets()
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT * FROM `sheets` LIMIT 50;"
        );
        $allSheets = $statement->fetchAll();
        return $allSheets;

    } catch (Exception $e) {
        echo ("Impossible d'accéder aux appels de loyers");
        die('Erreur : ' . $e->getMessage());
    }
}

//Afficher le dernier appel de loyer
function getLastSheet()
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT * FROM `sheets` ORDER BY sheet_id DESC LIMIT 1"
        );
        $lastSheet = $statement->fetch();
        return $lastSheet;

    } catch (Exception $e) {
        echo ("Impossible d'accéder aux appels de loyers");
        die('Erreur : ' . $e->getMessage());
    }
}

//Afficher un appel de loyer par son id
function getSheetById($id)
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT * FROM `sheets` WHERE sheet_id = " . $id . ";"
        );
        $sheet = $statement->fetch();
        return $sheet;

    } catch (Exception $e) {
        echo ("Impossible d'accéder aux appels de loyers");
        die('Erreur : ' . $e->getMessage());
    }
}

