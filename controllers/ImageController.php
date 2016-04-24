<?php

/**
 *  Контроллер страницы изображений
 *
 */

// подключаем модели
include_once '../models/ImagesModel.php';

/**
 * Формирование страницы галереи с изображениями
 *
 */
 function indexAction(){

     if(! isset($_SESSION['user'])){
         redirect('/');
     }

     $galleryId = isset($_GET['id']) ? $_GET['id'] : null;
     if($galleryId == null) exit();

     $rsImages = getImageForGallery($galleryId);

     if(!$rsImages){

         // Выводим пустую страницу
         $template = new Template(TemplatePrefix);
         $template->set("galleryId", $galleryId);
         $template->display("header");
         $template->display("images");
         $template->display("footer");

     } else {

         $template = new Template(TemplatePrefix);
         $template->set("images", $rsImages);
         $template->set("galleryId", $galleryId);
         $template->display("header");
         $template->display("images");
         $template->display("footer");
     }
 }

/**
 * Формирование страницы с изображением
 *
 */
function showAction(){

    if(! isset($_SESSION['user'])){
        redirect('/');
    }

    $image['id'] = isset($_GET['image']) ? $_GET['image'] : null;
    $image['comments'] = getComment($image['id']);
    $path = getImagePath($image['id']);
    $path = $path[0]['path'];
    $image['path'] = $path;

    if($image == null) exit();

    if(!$image){

        redirect('/');

    } else {

        $template = new Template(TemplatePrefix);
        $template->set("image", $image);
        $template->display("header");
        $template->display("image");
        $template->display("footer");
    }
}


/**
 *  Загрузка изображения
 *
 */
function createAction(){

    $imageDesc = $_POST['desc'];
    $id = $_POST['galleryId'];
    $imageName = imgLoad($_FILES['loadimage']);
    $path = '/images/' . $imageName . '.jpg';
    $tn_path = '/images/' . $imageName . '_mini.jpg';
    $author = $_SESSION['user']['name'];

    if ($imageName) {
        setImageInGallery($id, $imageName, $author, $path, $tn_path, $imageDesc);
        redirect('/image/index/?id=' . $id);
    }
    else {
        echo ("No!!!<br>");
        print_r($_FILES);
    }
}

/**
 * Добавление комментария
 *
 */
function commentAction(){

    $comment = $_POST['comment'];
    $img_id = $_POST['img_id'];
    $user = $_SESSION['user']['name'];

    setComment($user, $img_id, $comment);

    redirect("/" . $img_id . "/");

}