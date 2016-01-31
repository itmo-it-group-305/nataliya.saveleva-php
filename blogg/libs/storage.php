<?php


const DB_DIR = 'db';

function createFilenameItem($entity, $id)
{
   return DB_DIR . DIRECTORY_SEPARATOR . sprintf (getFilenamePattern($entity), $id);

}

// entityName_id.json => post_1.json, user_1.json
function getFilenamePattern($entity)
{
    return $entity . '_%d.json';

}

function storageGetAll($entity)
{
   $items = [];
   $dir = @opendir(DB_DIR);

    if (!$dir) {
        return $items;
    }

    do {
        $filename = readdir($dir);

       list($id) = sscanf($filename, getFilenamePattern($entity));

        if ($id){
           $items[] = storageGetItemById($entity, $id);
        };

    } while ($filename);

//var_dump(getFilenamePattern($entity));

    closedir($dir);

    return $items;
}


function storageGetItemById($entity, $id)
{
    $filename = createFilenameItem($entity, $id);

    if (!is_readable($filename)){
        return null;
    }

  return json_decode(
       file_get_contents($filename), true
   );

}


function storageSaveItem($entity, &$item)
{
    $id = isset($item['id']) ? $item['id'] : 0;
    $storedItem = storageGetItemById($entity, (int) $id) ?: [];

    if ($id && !$storedItem){
        return false;
    }

    $item = array_merge($storedItem, $item);
    $items  = storageGetAll($entity);

    if (!$id){
        $items  = storageGetAll($entity);

        foreach ($items as $storedItem){
            if ($storedItem['id'] > $id){
                $id = $storedItem['id'];
            }
        }

        $id +=1;

        /*$lenght = count($items);
        $id = $lenght ? $items[$lenght - 1]['id'] +1 : 1;
        $item['id'] = $id;*/
    }

    $item['id'] = (int) $id;

    $filename = createFilenameItem($entity, $id);
    $status  = file_put_contents($filename, json_encode($item), LOCK_EX);

    return (bool) $status;
}

function storageGetItemBy($entity, $attribute, $criteria)
{
    $items = [];
    $files = scandir(DB_DIR);
    foreach ($files as $filename) {
        list($id) = sscanf($filename, getFilenamePattern($entity));
        if ($id) {
            $item = storageGetItemById($entity, $id);
            if (
                $item && isset($item[$attribute]) && $item[$attribute] == $criteria
            ) {
                $items[] = $item;
            }
        }
    };
    return $items;
}