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
/* Correction du hiatus en français : la fonction doit aussi gérer la particule 'de' ou 'd' en fonction du mois */
function toFrench($string)
{
    if ($string == "January") {
        return "de janvier";
    }
    if ($string == "February") {
        return "de février";
    }
    if ($string == "March") {
        return "de mars";
    }
    if ($string == "April") {
        return "d'avril";
    }
    if ($string == 'May') {
        return "de mai";
    }
    if ($string == "June") {
        return "de juin";
    }
    if ($string == "July") {
        return "de juillet";
    }
    if ($string == "August") {
        return "d'août";
    }
    if ($string == "September") {
        return "de septembre";
    }
    if ($string == "October") {
        return "d'octobre";
    }
    if ($string == "November") {
        return "de novembre";
    }
    if ($string == "December") {
        return "de décembre";
    }
}