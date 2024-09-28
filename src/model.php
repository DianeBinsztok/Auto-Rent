<?php
//I - Authentification utilisateur - requêter tous les utilisateurs enregistrés
function getAllOwners()
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT * FROM owners;"
        );
        $allOwners = $statement->fetchAll();
        return $allOwners;

    } catch (Exception $e) {
        echo ("Impossible d'accéder à la liste des propriétaires");
        die('Erreur : ' . $e->getMessage());
    }
}

// II - Afficher tous les logements à louer d'un propriétaire
function getAllLocationsForOneUser($owner_id)
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

// III - Afficher le détail d'un logement à louer
function getOneLocationDetail($location_id)
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);
        $statement = $database->query(
            "SELECT * from locations WHERE locations.id =" . intval($location_id, 10) . " ;"
        );
        $LocationDetail = $statement->fetch();
        return $LocationDetail;

    } catch (Exception $e) {
        echo ("Impossible d'accéder aux données de ce logement");
        die('Erreur : ' . $e->getMessage());
    }
}

// IV - Enregistrer un nouveau logement
function createNewLocation(array $locationData)
{
    require "env.php";
    try {
        $database = new PDO($db . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset, $db_user, $db_pw);

        $statement = $database->prepare(
            "INSERT INTO locations (label, street_number, street_type, street_name, additional_adress_info, postal_code, city, surface, nb_of_rooms, energy_class, furnished, rent, rented, owner_id)
            VALUES (:location_label, :location_street_number, :location_street_type, :location_street_name, :location_additional_adress_info, :location_postal_code, :location_city, :location_surface, :location_nb_of_rooms, :location_energy_class, :location_furnished, :location_rent, :location_rented, :location_owner_id)"
        );

        $statement->execute([
            'location_label' => $locationData['location_label'],
            'location_street_number' => $locationData['location_street_number'],
            'location_street_type' => $locationData['location_street_type'],
            'location_street_name' => $locationData['location_street_name'],
            'location_additional_adress_info' => $locationData['location_additional_adress_info'] ?? null, // Optionnel
            'location_postal_code' => $locationData['location_postal_code'],
            'location_city' => $locationData['location_city'],
            'location_surface' => $locationData['location_surface'],
            'location_nb_of_rooms' => $locationData['location_nb_of_rooms'],
            'location_energy_class' => $locationData['location_energy_class'],
            'location_furnished' => $locationData['location_furnished'],
            'location_rent' => $locationData['location_rent'],
            'location_rented' => $locationData['location_rented'],
            'location_owner_id' => $locationData['location_owner_id']
        ]);

        $newLocationId = $database->lastInsertId();
        return $newLocationId;

    } catch (Exception $e) {
        echo ("Impossible d'ajouter cette location");
        die('Erreur : ' . $e->getMessage());
    }
}

/*
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