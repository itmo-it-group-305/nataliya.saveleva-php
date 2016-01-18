<?php

function newYearDate()
{
    $date = new DateTime();
    $year = $date->format('Y');
    $year++;
    $newYearDate = new DateTime((string)$year . "-01-01");
    echo "До нового года осталось " . $date->diff($newYearDate)->days . " дней";
}

newYearDate();