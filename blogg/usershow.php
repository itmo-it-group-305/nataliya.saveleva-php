<?php

require_once __DIR__ . '/app/models/user.php';
//require_once __DIR__ . '/app/models/post.php';
require_once __DIR__ . '/libs/storage.php';
require_once __DIR__ . '/libs/viev.php';

$user = getUserById(
    isset($_GET['id']) ? $_GET['id'] : ''
);

if (!$user) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
    exit ('Post not found!');
}

//var_dump($post);
?>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $user ['login'] ?></title>
</head>
<body>
<p>Имя пользователя: <?= $user ['login'] ?></p>
<p><?= $post ['login'] ?></p>
<header>
    <p>Пароль: <?= $user ['password'] ?></p>

</header>



</body>

</html>