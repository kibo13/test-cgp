<?php

function phone($phone): string
{
    return sprintf("+7 (%s) %s-%s-%s",
        substr($phone, 0, 3),
        substr($phone, 3, 3),
        substr($phone, 6, 2),
        substr($phone, 8, 2));
}

function money($amount, $decimal): string
{
    return number_format($amount, $decimal, ',', ' ');
}

function fio($lastname, $firstname, $middlename = null): string
{
    $F = ucfirst($lastname);
    $I = ucfirst(substr($firstname, 0, 1)) . '.';
    $O = $middlename ? ucfirst(substr($middlename, 0, 1)) . '.' : null;

    return "{$F} {$I}{$O}";
}
