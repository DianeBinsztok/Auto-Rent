<?php

require_once ('src/model.php');

function allSheets()
{
	$sheets = getAllSheets();
	require ('templates/dashboard.php');
}