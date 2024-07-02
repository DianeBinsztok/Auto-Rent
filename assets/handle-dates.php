<?php
function getMonthAndYear($date)
{
    if ($date) {
        $dateString = date('F Y', strtotime($date));
        $dateArray = explode(" ", $dateString);
        return toFrench($dateArray[0]) . " " . $dateArray[1];
    } else {
        $dateString = date('F Y', strtotime('+1 month'));
        $dateArray = explode(" ", $dateString);
        return toFrench($dateArray[0]) . " " . $dateArray[1];
    }
}

function getMonthInterval($date)
{
    if ($date) {
        $firstDay = date('01/m/Y', strtotime($date));
        $lastDay = date('t/m/Y', strtotime($date));
        return [$firstDay, $lastDay];
    } else {
        $firstDay = date('01/m/Y', strtotime('+1 month'));
        $lastDay = date('t/m/Y', strtotime('+1 month'));
        return [$firstDay, $lastDay];
    }

}
/* Correction du hiatus en français : la fonction doit aussi gérer la particule 'de' ou 'd' en fonction du mois */
function toFrench($string)
{
    switch ($string) {
        case "January":
            return "de janvier";
        case "February":
            return "de février";
        case "March":
            return "de mars";
        case "April":
            return "d'avril";
        case "May":
            return "de mai";
        case "June":
            return "de juin";
        case "July":
            return "de juillet";
        case "August":
            return "d'août";
        case "September":
            return "de septembre";
        case "October":
            return "d'octobre";
        case "November":
            return "de novembre";
        case "December":
            return "de décembre";
        default:
            echo '';
    }
}