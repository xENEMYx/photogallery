<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Профель пользователя
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="thumbnail avatar-panel">
                                <a href="#"><img src="/images/<?php print_r($_SESSION[user][name]) ?>_avatar.jpg" alt="avatar"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3"></div>
                            <div class="col-xs-4">
                                <a href="#spoilerGalleryCreate" data-toggle="collapse" class="btn btn-primary btn-xs">Загрузить аватар</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <table class="table">
                            <h3>Ваши регистрационные даные:</h3>
                            <tr>
                                <td>Логин (email)</td>
                                <td><?php print_r($_SESSION[user][email]) ?></td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td><input type="text" id="newName" value="<?php print_r($_SESSION[user][name]) ?>" /></td>
                            </tr>
                            <tr>
                                <td>Новый пароль</td>
                                <td><input type="password" id="newPwd1" value="" /></td>
                            </tr>
                            <tr>
                                <td>Повтор пароля</td>
                                <td><input type="password" id="newPwd2" value="" /></td>
                            </tr>
                            <tr>
                                <td>Для того чтобы сохранить данные введите текущий пароль</td>
                                <td><input type="password" id="curPwd" value="" /></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input class="btn btn-default" type="button" value="Сохранить изменения" onClick="updateUserData();"/></td>
                            </tr>
                        </table>
                        <div class="collapse" id="spoilerGalleryCreate">
                            <div class="well">
                                <form action="/user/loadavatar/" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="loadimage" name="loadimage">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Загрузить</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-8" id="userFriends">
                            <h4>Друзья</h4><hr>
                            <?php foreach ($this->friends as $item => $friend){ ?>
                            <a href="#"><?php print_r($friend) ?></a>,
                            <?php } ?><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>