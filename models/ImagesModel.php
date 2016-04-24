<?php

/**
 * Модель для таблицы изображений
 *
 */

/**
 * Получаем все изображения в галереи
 *
 */
function getImageForGallery($id){

    $sql = "SELECT * FROM `images` WHERE `gallery_id` = $id";

    $rs = mysql_query($sql);

    return createRsArray($rs);
}

/**
 * Загружаем изображение
 *
 */
function setImageInGallery($id, $imageName, $author, $path, $tn_path, $imageDesc){

        $sql = "INSERT INTO images (`gallery_id`, `name`, `author`, `path`, `tn_path`, `description`) VALUES ('$id', '$imageName', '$author', '$path', '$tn_path','$imageDesc')";
        $rs = mysql_query($sql);
}

/**
 * Запись комментария в базу
 *
 */
function setComment($user, $img_id, $comment){

    $sql = "INSERT INTO comments (`user`, `img_id`, `comment`) VALUES ('{$user}', '{$img_id}', '{$comment}')";
    mysql_query($sql);
}

/**
 * Получение всех комментариев к фото
 *
 */
function getComment($id){

    $sql = "SELECT * FROM `comments` WHERE `img_id` = $id";

    $rs = mysql_query($sql);

    return createRsArray($rs);

}

/**
 * Получаем все изображения
 *
 */
function getImageAll(){

    $sql = "SELECT * FROM `images`";

    $rs = mysql_query($sql);

    return createRsArray($rs);
}

/**
 * Получаем путь изображения
 *
 */
function getImagePath($id){

    $sql = "SELECT `path` FROM `images` WHERE `id` = $id";

    $rs = mysql_query($sql);

    return createRsArray($rs);
}