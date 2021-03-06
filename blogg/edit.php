<?php
//var_dump($_POST);

require_once __DIR__ . '/app/models/post.php';
require_once __DIR__ . '/libs/storage.php';
require_once __DIR__ . '/libs/viev.php';

$data = isset($_POST['post']) ? $_POST['post'] : [];
$post = [];
$errors = [];

if(isset($data['id'])) {
    $id = $data['id'];
} else if (isset($_GET['id'])){
    $id = $_GET['id'];
}



if (isset($id)){
    $post = getPostById((int) $id);

    if (!$post) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
        exit ('Post not found!');
    }
}

if ($data){
    $post = savePost($data, $errors);

    if (!$errors){
        // запись успешно сохранена
        header('location: edit.php?id=' . $post['id']);
        exit;
    }
}


?>
<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Бложек</title>
</head>
<body>
<form method="post">

    <div>
     <div class="error">
         <?= e($errors, 'title') ?>
     </div>
        <label for="">Заголовок</label>
        <input id="post_title" name="post[title]" type="text"
        value="<?= e($post, 'title') ?>">
    </div>
    <div>
     <div class="error"><?= e($errors, 'content') ?></div>
        <label for="">Текст записи</label>
        <textarea id="post_content" name="post[content]"><?= e($post, 'content') ?></textarea>
    </div>
    <?php if (isset($post['id'])): ?>
         <div>
             <input type="hidden" name="post[id]" value="<?=e($post, 'id') ?>">
         </div>
    <?php endif; ?>
    <div>
        <input type="submit">
    </div>

</form>
</body>

</html>