<?php
require_once ('src/model.php');
function sheetDetail($sheet_id)
{
    $sheet = getSheetById($sheet_id);
    require ('templates/sheet.php');
}