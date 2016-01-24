<?php


function removeDirectory($dir) {


    if ($objs = glob($dir . "/*")) {
        foreach($objs as $obj) {
            var_dump($dir);
            is_dir($obj) ? removeDirectory($obj) : unlink($obj);
        }
    }
    rmdir($dir);
    echo "Каталог " .  $dir . " успешно удален";
}

//removeDirectory("C:/openserver/domains/localhost/php/test");

?>