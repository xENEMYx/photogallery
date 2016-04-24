<div class="container">
  <div class="row">

<!-- ПОСЛЕДНИЕ ЗАГРУЗКИ -->

    <div class="panel panel-default">
      <div class="panel-heading">
        Последние загрузки
      </div>
      <div class="panel-body">
        <?php foreach ($this->Images as $item => $image){ ?>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
          <div class="thumbnail">
            <a href="/<?php print_r($image[id]) ?>/">
              <img src="<?php print_r($image[tn_path]) ?>" alt="">
            </a>
            <a href="/<?php print_r($image[author]) ?>/"><?php print_r($image[author]) ?></a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

<!-- ПОСЛЕДНИЕ ЗАГРУЗКИ -->

  </div>
</div>
