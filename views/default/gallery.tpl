<div class="container">
    <div class="row">

<!--// ВЫВОД ГАЛЕРЕЙ -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Галереи пользователя
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <td>Иконка</td>
                        <td>Название</td>
                        <td>Описание</td>
                        <td>Дата создания</td>
                    </thead>
                    <tbody>
                <?php foreach ($this->galleries as $item => $gallery){ ?>
                    <tr>
                        <td><img src="http://placehold.it/300x240" alt="" height="40"></td>
                        <td><a href="/image/index/<?php print_r($gallery[id]) ?>/"><?php print_r($gallery[name]) ?></a></td>
                        <td><?php print_r($gallery[description]) ?></td>
                        <td><?php print_r($gallery[created_at]) ?></td>
                    </tr>
                <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

<!-- ВЫВОД ГАЛЕРЕЙ //-->

    </div>

<!--// СПОЙЛЕР С ФОРМАЙ СОЗДАНИЯ ГАЛЕРЕИ -->

    <div class="row">
        <div class="col-xs-6">
            <a href="#spoilerGalleryCreate" data-toggle="collapse" class="btn btn-primary">Создать новую галерею</a>
            <div class="collapse" id="spoilerGalleryCreate">
                <div class="well">
                    <form action="/gallery/create/" class="form-horizontal" role="form" method="POST">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Название:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Название">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-sm-2 control-label">Описание:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" id="desc" name="desc" placeholder="Описание">
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- СПОЙЛЕР С ФОРМАЙ СОЗДАНИЯ ГАЛЕРЕИ //-->

</div>