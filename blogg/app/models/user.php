<?php

const ENTTY_USER = 'user';


function getUserBy($atribute, $value){
    return storageGetItemBy(ENTTY_USER, $atribute, $value);
}

function getAllUsers()
{
    return storageGetAll(ENTTY_USER);


}

function getUserById($id)
{
    return storageGetItemById(ENTTY_USER, $id);

}


function saveUser( $data, &$errors = null)
{
    $id = isset($data['id']) ? $data['id'] : null;
    $user = $data; //азультат после очистки и валидации

    if ($errors){
        return $user;
    }

  // $user['update'] = mktime();

    if (!$id) {

        $storedUser = storageGetItemBy(ENTTY_USER, 'login', $user['login']);

        if ($storedUser) {
            $errors['exists'] = 'Пользователь с таким именем уже существует!';
            return $user;
        }
        $user['created'] = mktime();
    }

    if ($user['password'] != $data['wpassword']) {
        $errors['password'] = 'Введенные пароли не совпадают';
        echo 'Введенные пароли не совпадают';
        return $user;
    }
   // $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);


    $status = storageSaveItem(ENTTY_USER, $user);

    if (!$status){
        $errors['db'] = 'Не удалось записать данные в базу';
    }

    return $user;
}



