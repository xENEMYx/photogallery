<?php

/**
 *  Контроллер страницы галерей
 * 
 */

// подключаем модели
include_once '../models/GalleriesModel.php';

/**
 * Формирование страницы галерей
 *
 */
 function indexAction(){

     if(! isset($_SESSION['user'])){
         redirect('/');
     }

	 $userId = isset($_GET['id']) ? $_GET['id'] : null;
     if($userId == null){
         redirect("/");
     }

	 $rsGallery = getGalleryForUser($userId);

     if(!$rsGallery){

        // Выводим пустую страницу
         $template = new Template(TemplatePrefix);
         $template->display("header");
         $template->display("gallery");
         $template->display("footer");

     } else {

         $template = new Template(TemplatePrefix);
         $template->set("galleries", $rsGallery);
         $template->display("header");
         $template->display("gallery");
         $template->display("footer");
     }
 }

/**
 * Создание галереи
 *
 */
function createAction(){
    $galleryName = $_POST['name'];
    $galleryDesc = $_POST['desc'];
    $id = $_SESSION[user][id];

    setNewGallery($id, $galleryName, $galleryDesc);

    redirect("/gallery/index/?id=".$id);

}