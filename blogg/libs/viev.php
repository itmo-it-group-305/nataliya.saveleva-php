<?php

function e($arr, $key, $defalt = '')
{
    return htmlspecialchars(
        p($arr, $key, $defalt)
    );
}

function p($arr, $key, $defalt = '')
{
    return isset($arr[$key]) ? $arr[$key] : $defalt;
}