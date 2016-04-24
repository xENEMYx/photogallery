<div class="container">
    <div class="row">

        <!--// ВЫВОД ИЗОБРАЖЕНИЯ -->

        <div class="panel panel-default">
            <div class="panel-heading">
                Изображение
            </div>
            <div class="panel-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="thumbnail">
                        <img src="<?php print_r($this->image[path]) ?>" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- ВЫВОД ИЗОБРАЖЕНИЯ //-->

    </div>
    <div class="row">

        <!--// ВЫВОД КОММЕНТАРИЯ -->

        <div class="panel panel-default">
            <div class="panel-heading">
                Комментарии
            </div>
            <div class="panel-body">


                <div class="col-sm-12">
                    <div class="row">
                    <?php foreach ($this->image[comments] as $item => $comment){ ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php print_r($comment[user]) ?>  <label class="text-right"><?php print_r($comment[published]) ?></label>
                            </div>
                            <div class="panel-body">
                            <p><?php print_r($comment[comment]) ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <hr>
                </div>

                <!--// ФОРМА КОММЕНТАРИЯ -->

                <form action="/image/comment/" class="form-horizontal" role="form" method="POST">
                    <div class="form-group">
                        <label for="comment" class="col-sm-3">Оставить комментарий:</label>
                        <div class="col-xs-9">
                            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                            <input type="hidden" name="img_id" value="<?php print_r($this->image[id]) ?>">
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>

                <!--// ФОРМА КОММЕНТАРИЯ -->

            </div>
        </div>

        <!--// ВЫВОД КОММЕНТАРИЯ -->

    </div>
