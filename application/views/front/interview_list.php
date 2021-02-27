<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="video-header check-color" data-color="#fce373">
	<div class="container-fluid">
		<h3>Video Gallery</h3><br>
		<?php if ($interviews): ?>
		<?php foreach ($interviews as $interview): ?>
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="video">
					<iframe src="<?= $interview['youtube_url'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="video-tagline">
					<div class="title">
						<p><b><?= $interview['title'] ?></b></p>
					</div>
					<div class="desc">
						<p><?= $interview['details'] ?></p>
					</div>
					<div class="date">
						<p><?= date('d M Y', strtotime($interview['created_at'])) ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach ?>
		<?php else: ?>
		NO Interview Available
		<?php endif ?>
	</div>
</div>