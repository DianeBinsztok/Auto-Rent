<?php

require_once ('src/model.php');

function allSheets($owner_id)
{
	// Récupérer les noms et id des locataires à part
	$sheets = getAllSheetsByUser($owner_id);
	$all_tenants = [];
	foreach ($sheets as $sheet) {
		if (in_array($sheet["tenant_id"], $all_tenants) == false) {
			array_push($all_tenants, array("tenant_id" => $sheet["tenant_id"], "tenant_name" => $sheet["tenant_name"], ));
		}
	}

	$tenants = [];
	foreach ($all_tenants as $tenant) {
		if (in_array($tenant, $tenants) == false) {
			array_push($tenants, array("tenant_id" => $tenant["tenant_id"], "tenant_name" => $tenant["tenant_name"], ));
		}
	}
	require ('templates/dashboard.php');
}