<?php
$array = [1, 2, 3, 8, 14, 89, 45];

var_dump($array);
$result = count($array);

var_dump($result);
echo ("<br>");

for ($i = count($array)-1; $i>=0 ; $i--){
    echo ($array[$i]  . ",");
}