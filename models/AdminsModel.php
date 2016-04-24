<?php

/**
 * Модель для панели администраторов
 *
 */

/**
 * Получаем список пользователей
 * 
 */
function getAllUsersData(){
    $sql = "SELECT * FROM `users`";
    $rs = mysql_query($sql);
    return createRsArray($rs);
}