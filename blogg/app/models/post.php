<?php

const ENTTY_POST = 'post';

function getAllPosts()
{
    return storageGetAll(ENTTY_POST);
    /*return [
        [
            'id' => 1,
            'title' => 'Post #1',
            'contente' => 'Fest post',
            'created' => mktime(),
            'updated' => mktime(),
        ],
        [
            'id' => 2,
            'title' => 'Post #2',
            'contente' => 'Fest post',
            'created' => mktime(),
            'updated' => mktime(),
        ],
        [
        'id' => 3,
        'title' => 'Post #3',
        'contente' => 'Fest post',
        'created' => mktime(),
        'updated' => mktime(),
         ],
    ];*/

}

function getPostById($id)
{
    return storageGetItemById(ENTTY_POST, $id);

    /*$items = getAllPosts();
    foreach ($items as $storedItem) {
        if ($storedItem['id'] == $id) {
            return $storedItem;
        }

    }

    return null;*/
}


function savePost($data, &$errors = null)
{
    $id = isset($data['id']) ? $data['id'] : null;
    $post = $data; //азультат после очистки и валидации

    if ($errors){
        return $post;
    }

    $post['update'] = mktime();

    if (!$id) {
        $post['created'] = mktime();
    }

    $status = storageSaveItem(ENTTY_POST, $post);

    if (!$status){
        $errors['db'] = 'Не удалось записать данные в базу';
    }

    return $post;
}