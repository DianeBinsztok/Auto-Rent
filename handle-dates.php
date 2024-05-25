<?php
/* Les existe des méthodes pour traduire le mois en français mais rien de ce que j'ai testé ne fonctionne et la doc m'a donné des anévrismes */
function getMonthAndYear()
{
    $comingMonth = date('F', strtotime('+1 month'));
    $year = date('Y', strtotime('+1 month'));
    return (toFrench($comingMonth) . " " . $year);
}
function getNextMonth()
{
    return date('F', strtotime('+1 month'));
}
function getMonthInterval()
{
    // https://stackoverflow.com/questions/2094797/the-first-day-of-the-current-month-in-php-using-date-modify-as-datetime-object
    $firstDay = date('01/m/Y', strtotime(getNextMonth()));
    $lastDay = date('t/m/Y', strtotime(getNextMonth()));
    return [$firstDay, $lastDay];
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