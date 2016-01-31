<?php

//var_dump(__DIR__);

require_once __DIR__ . '/libs/storage.php';
require_once __DIR__ . '/app/models/post.php';

/*var_dump(
    storageSaveItem('post', [
        'title' => 'Post #1',
        'content' => 'First post'
    ])
);*/

/*var_dump(
    createFilenameItem('post', 1),
    createFilenameItem('user', 666),
    createFilenameItem('category', 0)
);*/

$posts = getAllPosts();

//var_dump($posts);
?>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Бложек</title>
</head>
<body>
    <?php foreach ($posts as $post):?>
    <section>
        <header>
            <h2>
                <a href="show.php?id=<?= $post['id'] ?>"><?= $post ['title'] ?></a>
                </h2>
            <ul>
                <li>Создан <?= date("Y-m-d H:i", $post ['created']) ?></li>
                <li>Обновлен <?= Date ("Y-m-d H:i", $post ['updated']) ?></li>

            </ul>

        </header>

        <?= $post ['contente'] ?>

    </section>
    <?php endforeach; ?>
</body>

</html>
