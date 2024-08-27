<?php
//Retourner tous les utilisateurs
function getAllUsers()
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT * FROM users;"
        );
        $allUsers = $statement->fetchAll();
        return $allUsers;

    } catch (Exception $e) {
        echo ("Impossible d'accéder à la liste des propriétaires");
        die('Erreur : ' . $e->getMessage());
    }
}

// I- LES PROPRIÉTAIRES
//Afficher tous les biens à louer d'un propriétaire
function getAllLocations($owner_id)
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT * from locations WHERE owner_id =" . intval($owner_id, 10) . " ;"
        );
        $allLocations = $statement->fetchAll();
        return $allLocations;

    } catch (Exception $e) {
        echo ("Impossible d'accéder aux bien à louer");
        die('Erreur : ' . $e->getMessage());
    }
}

// II - LES LOCATAIRES
// Afficher les données sur un locataire
function getTenantInfo($tenant_id)
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT * from tenants JOIN locations ON locations.id = tenants.location_id WHERE tenants.id =" . intval($tenant_id, 10) . " ;"
        );
        $tenant = $statement->fetch();
        return $tenant;

    } catch (Exception $e) {
        echo ("Impossible d'accéder aux données du locataire");
        die('Erreur : ' . $e->getMessage());
    }
}
/*
//Afficher tous les appels de loyer d'un utilisateur
function getAllSheetsByUser($user_id)
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT sheet_id, sheet_date, sheet_rent, sheet_charges, tenants.tenant_id, tenants.tenant_name FROM sheets JOIN tenants ON tenants.tenant_id=sheets.tenant_id WHERE owner_id =" . intval($user_id, 10) . " ;"
        );
        $allSheets = $statement->fetchAll();
        return $allSheets;

    } catch (Exception $e) {
        echo ("Impossible d'accéder aux appels de loyers");
        die('Erreur : ' . $e->getMessage());
    }
}
// Retourner tous les biens en location / locataires d'un utilisateur
function getAllTenantsByUser($user_id)
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT tenants.tenant_id, tenants.tenant_name, tenants.tenant_street, tenants.tenant_city FROM sheets JOIN tenants ON tenants.tenant_id=sheets.tenant_id WHERE owner_id =" . intval($user_id, 10) . " ;"
        );
        $allSheetsTenants = $statement->fetchAll();
        $allTenants = [];
        foreach ($allSheetsTenants as $tenant) {
            if (in_array($tenant, $allTenants) == false) {
                array_push($allTenants, $tenant);
            }
        }
        return $allTenants;

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
            "SELECT * FROM `sheets`
            INNER JOIN tenants ON tenants.tenant_id=sheets.tenant_id
            INNER JOIN owners ON owners.owner_id=sheets.owner_id
            ORDER BY sheet_id DESC LIMIT 1"
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
            "SELECT * FROM `sheets` 
            INNER JOIN tenants ON tenants.tenant_id=sheets.tenant_id
            INNER JOIN owners ON owners.owner_id=sheets.owner_id
            WHERE sheet_id = " . $id . ";"
        );
        $sheet = $statement->fetch();
        return $sheet;

    } catch (Exception $e) {
        echo ("Impossible d'accéder aux appels de loyers");
        die('Erreur : ' . $e->getMessage());
    }
}

*/