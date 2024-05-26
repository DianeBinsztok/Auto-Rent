<?php
function getMonthAndYear()
{
    if ($_POST["date"]) {
        $dateString = date('F Y', strtotime($_POST["date"]));
        $dateArray = explode(" ", $dateString);
        return toFrench($dateArray[0]) . " " . $dateArray[1];
    } else {
        $dateString = date('F Y', strtotime('+1 month'));
        $dateArray = explode(" ", $dateString);
        return toFrench($dateArray[0]) . " " . $dateArray[1];
    }
}

function getMonthInterval()
{
    if ($_POST["date"]) {
        $firstDay = date('01/m/Y', strtotime($_POST["date"]));
        $lastDay = date('t/m/Y', strtotime($_POST["date"]));
        return [$firstDay, $lastDay];
    } else {
        $firstDay = date('01/m/Y', strtotime('+1 month'));
        $lastDay = date('t/m/Y', strtotime('+1 month'));
        return [$firstDay, $lastDay];
    }

}
function toFrench($string)
{
    if ($string == 'January') {
        return 'janvier';
    }
    if ($string == 'February') {
        return 'février';
    }
    if ($string == 'March') {
        return 'mars';
    }
    if ($string == 'April') {
        return 'avril';
    }
    if ($string == 'May') {
        return 'mai';
    }
    if ($string == 'June') {
        return 'juin';
    }
    if ($string == 'July') {
        return 'juillet';
    }
    if ($string == 'August') {
        return 'août';
    }
    if ($string == 'September') {
        return 'septembre';
    }
    if ($string == 'October') {
        return 'octobre';
    }
    if ($string == 'November') {
        return 'novembre';
    }
    if ($string == 'December') {
        return 'décembre';
    }
}