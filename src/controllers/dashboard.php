<?php

require_once ('src/model.php');

function allSheets($owner_id)
{
	$sheets = getAllSheetsByUser($owner_id);
	require ('templates/dashboard.php');
}