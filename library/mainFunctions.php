<?php

/**
 * Основные функции
 * 
 */

/**
 * Формирование запрашиваемой страницы
 * 
 * @param string $controllerName название контроллера
 * @param string $actionName название функции обработки страницы 
 */
function loadPage($data, $controllerName, $actionName = 'index'){
	
	include_once PathPrefix . $controllerName . PathPostfix;
   
    $function = $actionName . 'Action';
    $function($data);
}

/**
 * Функция отладки. Останавливает работу програамы выводя значение переменной
 * $value
 * 
 * @param variant $value переменная для вывода ее на страницу 
 */
function dd($value = null, $die = 1)
{
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';
    
    if($die) die;
}

/**
 * Преобразорвание результата работы функции выборки в ассоциативный массив
 * 
 * @param recordset $rs набор строк - результат работы SELECT
 * @return array 
 */
function createRsArray($rs)
{
    if(! $rs) return false;
    
    $Rs = array();
    while ($row = mysql_fetch_assoc($rs)) {
        $Rs[] = $row;
    }

    return $Rs;
}

/**
 * Редирект
 * 
 * @param string $url адрес для перенаправления 
 */
function redirect($url)
{
    if(! $url) $url = '/';
    header("Location: {$url}");
    exit; 
}


/**
 * Загрузка изображения
 *
 */
function imgLoad($img){

    $path_directory = "../www/images/";
    $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
    foreach ($blacklist as $item)
        if(preg_match("/$item\$/i", $img['name'])) exit;
    $type = $img['type'];
    $size = $img['size'];
    if (($type != "image/jpg") && ($type != "image/jpeg")) exit;
    if ($size > 1500000) exit;
    $date=time();
    $imageName = md5($img['name']);
    $uploadfile = $path_directory . $imageName . ".jpg";

    move_uploaded_file($img['tmp_name'], $uploadfile);

    //СОЗДАНИЕ КВАДРАТНОГО ИЗОБРАЖЕНИЯ И ЕГО ПОСЛЕДУЮЩЕЕ СЖАТИЕ
    // dest - результирующее изображение
    // w - ширина изображения
    // ratio - коэффициент пропорциональности
    $im = imagecreatefromjpeg($uploadfile);
    $w = 320;
    $h = 320;

    $w_src = imagesx($im); //вычисляем ширину
    $h_src = imagesy($im); //вычисляем высоту изображения

    $dest = imagecreatetruecolor($w,$h);

    // вырезаем квадратную серединку по x, если фото горизонтальное
    if ($w_src>$h_src)
        imagecopyresampled($dest, $im, 0, 0,
            round((max($w_src,$h_src)-min($w_src,$h_src))/2),
            0, $w, $h, min($w_src,$h_src), min($w_src,$h_src));

    // вырезаем квадратную верхушку по y, если фото вертикальное
    if ($w_src < $h_src)
        imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h,
            min($w_src,$h_src), min($w_src,$h_src));

    // квадратная картинка масштабируется без вырезок
    if ($w_src==$h_src)
        imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h, $w_src, $w_src);

    imagejpeg($dest, $path_directory . $imageName . "_mini.jpg");

    return ($imageName);
}

function avatarLoad($img){

    $path_directory = "../www/images/";
    $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
    foreach ($blacklist as $item)
        if(preg_match("/$item\$/i", $img['name'])) exit;
    $type = $img['type'];
    $size = $img['size'];
    if (($type != "image/jpg") && ($type != "image/jpeg")) exit;
    if ($size > 1500000) exit;
    $date=time();
    $imageName = $_SESSION[user][name] . "_avatar.jpg";
    $uploadfile = $path_directory . $imageName;

    move_uploaded_file($img['tmp_name'], $uploadfile);

    //СОЗДАНИЕ КВАДРАТНОГО ИЗОБРАЖЕНИЯ И ЕГО ПОСЛЕДУЮЩЕЕ СЖАТИЕ
    // dest - результирующее изображение
    // w - ширина изображения
    // ratio - коэффициент пропорциональности
    $im = imagecreatefromjpeg($uploadfile);
    $w = 320;
    $h = 320;

    $w_src = imagesx($im); //вычисляем ширину
    $h_src = imagesy($im); //вычисляем высоту изображения

    $dest = imagecreatetruecolor($w,$h);

    // вырезаем квадратную серединку по x, если фото горизонтальное
    if ($w_src>$h_src)
        imagecopyresampled($dest, $im, 0, 0,
            round((max($w_src,$h_src)-min($w_src,$h_src))/2),
            0, $w, $h, min($w_src,$h_src), min($w_src,$h_src));

    // вырезаем квадратную верхушку по y, если фото вертикальное
    if ($w_src < $h_src)
        imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h,
            min($w_src,$h_src), min($w_src,$h_src));

    // квадратная картинка масштабируется без вырезок
    if ($w_src==$h_src)
        imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h, $w_src, $w_src);

    imagejpeg($dest, $uploadfile);

    return ($imageName);
}

/**
 * Генерируем случайную строку
 *
 * @param int $length
 * @return string
 */
function generatePassword($length = 6) {
    $possibleChars = "abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $password = '';

    for($i = 0; $i < $length; $i++) {
        $rand = rand(0, strlen($possibleChars) - 1);
        $password .= substr($possibleChars, $rand, 1);
    }

    return $password;
}