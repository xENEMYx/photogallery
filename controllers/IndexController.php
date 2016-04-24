<?php

/**
 *  Контроллер главной страницы
 * 
 */

// подключаем модели
include_once '../models/GalleriesModel.php';
include_once '../models/ImagesModel.php';

function testAction(){
	echo 'IndexController.php > testAction';
}

/**
 * Формирование главной страницы сайта
 *
 */ 
function indexAction(){

    $Images = getImageAll();

    $template = new Template(TemplatePrefix);
    $template->set("Images", $Images);
    $template->display("header");
    $template->display("content");
    $template->display("footer");

}
