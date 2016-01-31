<?php
require_once __DIR__ . '/app/models/post.php';
require_once __DIR__ . '/libs/storage.php';

$post = getPostById(
    isset($_GET['id']) ? $_GET['id'] : ''
);

if (!$post) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
    exit ('Post not found!');
}

//var_dump($post);
?>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $post ['title'] ?></title>
</head>
<body>
    <h1><title><?= $post ['title'] ?></title></h1>
    <p><?= $post ['title'] ?></p>
        <header>
            <title><?= $post ['title'] ?></title>
            <p>Создан <?= date("Y-m-d H:i", $post ['created']) ?></p>
            <p>Обновлен <?= Date ("Y-m-d H:i", $post ['updated']) ?></p>
        </header>

        <?= $post ['contente'] ?>

</body>

</html>
