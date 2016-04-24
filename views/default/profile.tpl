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
                                <a href="#"><img src="/images/<?php print_r($this->userData[name]) ?>_avatar.jpg" alt="avatar"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3"></div>
                            <div class="col-xs-4">
                                <a href="/user/add/?name=<?php print_r($this->userData[name]) ?>" class="btn btn-primary btn-xs">Добавить в друзья</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <table class="table">
                            <h3>Даные пользователя <?php print_r($this->userData[name]) ?>:</h3>
                            <tr>
                                <td>Логин (email)</td>
                                <td><?php print_r($this->userData[email]) ?></td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td><?php print_r($this->userData[name]) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>