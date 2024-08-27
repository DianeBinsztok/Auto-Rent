<?php
require_once('src/model.php');

// 0 - Propriétaire, locataire
if ($user['owner_id'] || $user['tenant_id']) {
    $owner_id = $user['owner_id'];
    $tenant_id = $user['tenant_id'];
    if ($owner_id) {
        $locations = allLocations($owner_id);
    }
    if ($tenant_id) {
        $tenant = getTenantInfoFromModel($tenant_id);
    }
} else {
    echo "Vous n'êtes ni propriétaire ni locataire";
}
require("templates/dashboard.php");

// I - PARTIE PROPRIÉTAIRE
function allLocations($owner_id)
{
    return getAllLocations($owner_id);
}

// I - PARTIE LOCATAIRE
function getTenantInfoFromModel($tenant_id)
{
    return getTenantInfo($tenant_id);
}