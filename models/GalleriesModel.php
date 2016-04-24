<?php

/**
 * Модель для таблицы галерей
 * 
 */


/**
 * Получить все галлереи пользователя
 *
 */
function getGalleryForUser($id){

   $sql = "SELECT * FROM `gallery` WHERE `user_id` = $id";

   $rs = mysql_query($sql);

   return createRsArray($rs);
}

/**
 * Запись новой галереи в базу
 *
 */
function setNewGallery($id, $galleryName, $galleryDesc){

   $galleryName   = htmlspecialchars(mysql_real_escape_string($galleryName));
   $galleryDesc    = htmlspecialchars(mysql_real_escape_string($galleryDesc));

   $sql = "INSERT INTO gallery (`user_id`, `name`, `description`) VALUES ('$id', '$galleryName', '$galleryDesc')";

   $rs = mysql_query($sql);
}
