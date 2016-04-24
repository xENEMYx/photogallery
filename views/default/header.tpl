<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Photogallery</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/dropzone.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- MENU OPEN -->

<div class="navbar navbar-default navbar-statc-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                <span class="sr-only">Open</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Фотогалерея</a>
        </div>
        <div class="collapse navbar-collapse" id="responsive-menu">
            <ul class="nav navbar-nav">
                <li><a href="/gallery/index/<?php print_r($_SESSION[user][id]) ?>/">Галереи</a></li>
                <li><a href="/user/index/">Профиль</a></li>
                <?php if($_SESSION['user']['admin']==true){ ?>
                <li><a href="/admin/index/">Admin-панель</a></li>  <?php } ?>
                <li><a href="#">О нас</a></li>
            </ul>
            <?php if(!$_SESSION[user]){ ?>
                <nav class="navbar-form navbar-right" id="loginBox">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                        ВОЙТИ
                    </button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#regModal">
                        РЕГИСТРАЦИЯ
                    </button>
                </nav>
            <?php }else{ ?>
                <nav class="navbar-form navbar-right">
                <?php print_r($_SESSION[user][name]); ?>
                    <a type="button" class="btn btn-default" href="/user/logout/">ВЫЙТИ</a>
                </nav>
            <?php } ?>
        </div>
    </div>
</div>

<!-- MENU CLOSE -->

<!-- Модальное окно регистрации -->

<div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <form action="" class="form-horizontal" role="form" id="registerBox">
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">E-mail:</label>
                                <div class="col-xs-4">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwd1" class="col-sm-2 control-label">Пароль:</label>
                                <div class="col-xs-4">
                                    <input type="password" class="form-control" id="pwd1" name="pwd1" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwd2" class="col-sm-2 control-label">Повторите пароль:</label>
                                <div class="col-xs-4">
                                    <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="OKPassword">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary" onclick="registerNewUser();">Зарегестрироваться</button>
            </div>
        </div>
    </div>
</div>

<!-- МОДАЛЬНОЕ ОКНО АВТОРИЗАЦИИ -->

<div class="modal fade bs-example-modal-md" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Войти</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <form action="" class="form-horizontal" role="form" id="loginBox">
                            <div class="form-group">
                                <label for="loginEmail" class="col-sm-1 control-label">E-mail:</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="loginEmail" name="loginEmail" placeholder="E-mail" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="loginPwd" class="col-sm-1 control-label">Пароль:</label>
                                <div class="col-xs-4">
                                    <input type="password" class="form-control" id="loginPwd" name="loginPwd" placeholder="Password" value="">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary" onclick="login();">Войти</button>
            </div>
        </div>
    </div>
</div>