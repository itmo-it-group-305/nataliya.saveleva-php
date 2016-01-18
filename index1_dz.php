<?php
$year = 2003;
$isLeap = is_int ((2016-$year)/4) ? 'високосный' : 'обычный';

var_dump($isLeap);



$minute = date("i");
echo ($minute);

$x = $minute%5;

$colorLight =  ($x<3) ? 'зеленый' : 'красный';

echo ($colorLight);