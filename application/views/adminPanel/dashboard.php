<?php defined('BASEPATH') OR exit('No direct script access allowed'); $img = $this->main->check('advertisements', ['id' => 1], 'advertisement'); ?>
<?= form_open_multipart(admin('home/upload/'), '', ['unlink' => $img]) ?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<?= form_label('Advertise Image', 'image') ?>
			<div class="input-group">
				<div class="custom-file">
					<?= form_input([
					'type' => "file",
					'name' => "image",
					'class' => "custom-file-input",
					'id' => "image",
					'accept' => '.png,.jpeg,.jpg,',
					'onchange' => 'this.form.submit()'
					]) ?>
					<?= form_label('Select image', 'image', ['class' => 'custom-file-label']) ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 mb-4">
		<?= img(['src' => 'assets/images/'.$img, 'height' => 100, 'width' => 100]) ?>
	</div>
</div>
<?= form_close() ?>
<div class="row">
	<div class="col-12 col-sm-6 col-md-3">
		<?= anchor(admin('blog'),
		'<div class="info-box">
			<span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Blogs</span>
				<span class="info-box-number">'.$this->main->count('blog', ['is_deleted' => 0]).'</span>
			</div>
		</div>', 'class="text-dark"') ?>
	</div>
	<div class="col-12 col-sm-6 col-md-3">
		<?= anchor(admin('bookPurchase'),
		'<div class="info-box mb-3">
			<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-gift"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Book Purchase</span>
				<span class="info-box-number">'.$this->main->count('book_purchase', ['is_deleted' => 0]).'</span>
			</div>
		</div>', 'class="text-dark"') ?>
	</div>
	<div class="col-12 col-sm-6 col-md-3">
		<?= anchor(admin('vendor'),
		'<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Vendor</span>
				<span class="info-box-number">'.$this->main->count('vendor', ['is_deleted' => 0]).'</span>
			</div>
		</div>', 'class="text-dark"') ?>
	</div>
	<div class="col-12 col-sm-6 col-md-3">
		<?= anchor(admin('interview'),
		'<div class="info-box mb-3">
			<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-question"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Interview</span>
				<span class="info-box-number">'.$this->main->count('interview', ['is_deleted' => 0]).'</span>
			</div>
		</div>', 'class="text-dark"') ?>
	</div>
</div>