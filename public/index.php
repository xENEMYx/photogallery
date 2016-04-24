<?php
session_start(); // стартуем сессию

include_once '../config/config.php';            // Инициализация настроек
include_once '../config/db.php';                // Инициализация базы данных
include_once '../library/mainFunctions.php';    // Основные функции
include_once '../library/template.php';         // Шаблонизатор

// определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

// определяем с какой функцией будем работать
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
//d($actionName);

/* если в сессии есть данные об авторизированном пользователе, то передаем их в шаблон
if(isset($_SESSION['user'])){
  //  print_r($_SESSION['user']);
    $data = $_SESSION['user'];
}
*/

loadPage("", $controllerName, $actionName);
