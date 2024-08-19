<?php
require_once ('src/model.php');

function askForTenantBeforeGetLastSheetToCreateNew()
{
    $user = $_GET['user'];
    $allTenantsByUser = getAllTenantsByUser($user);
    require ('templates/chooseTenantToCreateNewSheet.php');
}

function getLastSheetToCreateNew()
{
    $sheet = getLastSheet();
    require ('templates/editable-sheet.php');
}