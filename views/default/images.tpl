<div class="container">
	<div class="row">

<!--// ВЫВОД ИЗОБРАЖЕНИЙ -->

	<div class="panel panel-default">
		<div class="panel-heading">
			Галерея
		</div>
		<div class="panel-body">
			<?php foreach ($this->images as $item => $image){ ?>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<div class="thumbnail">
					<a href="/<?php print_r($image[id]) ?>/">
						<img src="<?php print_r($image[tn_path]) ?>" alt="Изображение">
					</a>
					<p><?php print_r($image[name]) ?></p>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

<!-- ВЫВОД ИЗОБРАЖЕНИЙ //-->

	</div>
	<div class="row">
		<form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>

<!--// СПОЙЛЕР С ФОРМОЙ ЗАГРУЗКИ ИЗОБРАЖЕНИЯ -->

		<div class="col-xs-8">
			<a href="#spoilerGalleryCreate" data-toggle="collapse" class="btn btn-primary">Загрузить изображение</a>
			<div class="collapse" id="spoilerGalleryCreate">
				<div class="well">
					<form action="/image/create/" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">
						<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
						<input type="hidden" name="galleryId" value="<?php print_r($this->galleryId)?>" />
						<div class="form-group">
							<label for="loadimage" class="col-sm-2 control-label">Изображение:</label>
							<div class="col-xs-10">
								<input type="file" class="form-control" id="loadimage" name="loadimage">
							</div>
						</div>
						<div class="form-group">
							<label for="desc" class="col-sm-2 control-label">Описание:</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="desc" name="desc" placeholder="Описание">
							</div>
						</div>
						<hr>
						<button type="submit" class="btn btn-primary">Загрузить</button>
					</form>
				</div>
			</div>
		</div>

<!-- СПОЙЛЕР С ФОРМОЙ ЗАГРУЗКИ ИЗОБРАЖЕНИЯ //-->

	</div>

	<script src="/js/dropzone.js"></script>