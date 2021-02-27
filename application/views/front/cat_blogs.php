<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="blog-part check-color" data-color="<?= $cat['background'] ?>">
		<div class="blog-sidebar" style="background-color: <?= $cat['background'] ?>">
			<div class="blog-sidebar-menu <?= ($this->agent->is_mobile()) ? 'responsive' : '' ?>">
				<?php foreach ($cats as $v): ?>
				<div class="main-cat">
					<a href="<?= $v['cat_slug'] ?>">
						<img src="<?= $v['cat_image'] ?>">
					</a>
				</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="blog-sidenav">
			<ul>
				<li><a href=https://www.facebook.com/gujaratniamirat-513185555887215/><i class="fab fa-facebook-f" target="_blank"></i></a></li>
				<li><a href=https://mobile.twitter.com/gujaratniamirat><i class="fab fa-twitter"></i></a></li>
				<li><a href="https://youtube.com/channel/UCCvHs_611-ZbMsf4bFHejpg"><i class="fab fa-youtube"></i></a></li>
				<li><a href="http://www.instagram.com/gujaratniamirat"><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div>
		<div class="blog-list text-center" style="background-color: <?= $cat['background'] ?>">
			<br>
			<h2><?= $cat['cat_name'] ?></h2>
			<?php if ($blogs): ?>
			<div class="row">
				<?php foreach ($blogs as $blog): ?>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="blog-cat" style="background-color: <?= $cat['cat_color'] ?>">
						<a href="<?= $blog['blog_slug'] ?>">
							<div class="blog-img text-center">
								<img src="<?= $blog['image'] ?>">
							</div>
							<div class="extra-img text-center">
								<img src="<?= $blog['blogger_image'] ?>">
							</div>
							<div class="blog-text text-center">
								<p><b><?= $blog['details'] ?></b></p>
							</div>
						</a>
						<?php $audio = explode('/', $blog['audio']); if (file_exists('assets/blog/'.end($audio))): ?>
						<div class="blog-audio text-center">
							<audio controls>
								<source src="<?= $blog['audio'] ?>" type="">
							</audio>
						</div>
						<?php endif ?>
						<br>
					</div><br>
				</div>
				<?php endforeach ?>
			</div>
			<?php else: ?>
			<div class="col-md-12">
				<img src="<?= assets('images/coming-soon.png') ?>" <?= ($this->agent->is_mobile()) ? 'width="100%"' : '' ?>>
			</div>
			<?php endif ?>
		</div>
	</div>
</div>