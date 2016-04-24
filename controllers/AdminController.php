<?php
/**
 * Коитроллер админ панели
 *
 */

// подключаем модели
include_once '../models/AdminsModel.php';

/**
 * Формируем страницу панели администратора
 *
 */
function indexAction(){

    if(! isset($_SESSION['user']) || $_SESSION['user']['admin'] != true){
        redirect('/');
    }

    $index = "index";

    $template = new Template(TemplatePrefix);
    $template->set("index", $index);
    $template->display("header");
    $template->display("adminpanel");
    $template->display("footer");

}

/**
 * Формируем страницу со списком пользователей
 *
 */
function getAction(){

    if(! isset($_SESSION['user']) || $_SESSION['user']['admin'] != true){
        redirect('/');
    }
    $index = "get";
    $list = getAllUsersData();

    $template = new Template(TemplatePrefix);
    $template->set("index", $index);
    $template->set("list", $list);
    $template->display("header");
    $template->display("adminpanel");
    $template->display("footer");

}