<?php
require_once('src/model.php');

// Lister tous les logements à louer de l'utilisateur
function allLocations($owner_id)
{
    return getAllLocations($owner_id);
}