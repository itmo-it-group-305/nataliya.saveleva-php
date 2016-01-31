<?php
//var_dump($_POST);

require_once __DIR__ . '/app/models/user.php';
//require_once __DIR__ . '/app/models/post.php';
require_once __DIR__ . '/libs/storage.php';
require_once __DIR__ . '/libs/viev.php';

$data = isset($_POST['user']) ? $_POST['user'] : [];
$user = [];
$errors = [];

if(isset($data['id'])) {
    $id = $data['id'];
} else if (isset($_GET['id'])){
    $id = $_GET['id'];
}



if (isset($id)){
    $user = getUserById((int) $id);

    if (!$user) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
        exit ('Post not found!');
    }
}

if ($data){
    $user = saveUser($data, $errors);

    if (!$errors){
        // запись успешно сохранена
        header('location: userform.php?id=' . $user['id']);
        exit;
    }
}


?>
<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
</head>
<body>
<form method="post">

    <div>
        <div class="error">
            <?= e($errors, 'login') ?>
        </div>
        <label for="">Имя пользователя</label>
        <input id="user_login" name="user[login]" type="text"
               value="<?= e($user, 'login') ?>">
    </div>
    <div>
        <div class="error"><?= e($errors, 'password') ?></div>
        <label for="">Пароль</label>
        <input id="user_password" name="user[password]" type="password"
               value="<?= e($user, 'password') ?>">
    </div>
    <div>
        <div class="error"><?= e($errors, 'wpassword') ?></div>
        <label for="">Повтор пароля</label>
        <input id="user_title" name="user[wpassword]" type="password"
               value="<?= e($user, 'wpassword') ?>">
    </div>
    <?php if (isset($user['id'])): ?>
        <div>
            <input type="hidden" name="user[id]" value="<?=e($user, 'id') ?>">
        </div>
    <?php endif; ?>
    <div>
        <input type="submit">
    </div>

</form>


</body>

</html>

