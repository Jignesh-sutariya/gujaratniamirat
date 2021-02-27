<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="blog-part check-color" data-color="<?= $blogs['background'] ?>">
		<div class="blog-sidebar" style="background-color: <?= $blogs['background'] ?>">
			<div class="blog-sidebar-menu <?= ($this->agent->is_mobile()) ? 'responsive' : '' ?>" >
				<?php foreach ($cats as $cat): ?>
				<div class="main-cat">
					<a href="<?= $cat['cat_slug'] ?>">
						<img src="<?= $cat['cat_image'] ?>">
					</a>
				</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="blog-sidenav check-color" data-color="<?= $blogs['background'] ?>">
			<ul>
				<li><a href=https://www.facebook.com/gujaratniamirat-513185555887215/><i class="fab fa-facebook-f" target="_blank"></i></a></li>
				<li><a href=https://mobile.twitter.com/gujaratniamirat><i class="fab fa-twitter"></i></a></li>
				
				<li><a href="https://youtube.com/channel/UCCvHs_611-ZbMsf4bFHejpg"><i class="fab fa-youtube"></i></a></li>
				<li><a href="http://www.instagram.com/gujaratniamirat"><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div>
		<div class="open-blog check-color" data-color="<?= $blogs['background'] ?>">
			<div class="open-blog-title" style="background-color: <?= $blogs['background'] ?>">
				<p class="cat-name"><u><?= $blogs['cat_name'] ?></u></p><br>
				<p class="text-center open-title"><b>
					<?= $blogs['title'] ?>
				</b></p>
			</div>
			<div class="open-blog-details" style="background-color: <?= $blogs['cat_color'] ?>">
				<div class="open-blog-header text-center">
					<?php $video = explode('/', $blogs['video']); if (file_exists('assets/blog/'.end($video))): ?>
					<video autoplay controls>
						<source src="<?= $blogs['video'] ?>" >
					</video>
					<?php else: ?>
					<?php $image = explode('/', $blogs['image']);
					$img = (file_exists('assets/blog/'.end($image))) ? $blogs['image'] : assets('images/category.png') ?>
					<img src="<?= $img ?>" alt="">
					<?php endif ?>
					<div class="posted-by">
						<p>Written by - <?= $blogs['created_by'] ?></p>
						<img src="<?= $blogs['blogger_image'] ?>" alt="">
					</div>
					<div class="blog-date">
						<p><?= date('d M Y', strtotime($blogs['created_at'])) ?></p>
					</div>
					<?php $audio = explode('/', $blogs['audio']); if (file_exists('assets/blog/'.end($audio))): ?>
					<div class="blog-audio">
						<audio controls>
							<source src="<?= $blogs['audio'] ?>" type="">
						</audio>
						<div class="audio-by">
							<p>Voice by - <?= $blogs['created_by'] ?></p>
						</div>
					</div>
					<?php endif ?>
				</div>
			</div>
			<div class="open-blog-content" style="background-color: <?= $blogs['cat_color'] ?>">
				<div class="container">
					<!-- <div class="blog-text"> -->
					<?= $blogs['details'] ?><br>
					<!-- </div> -->
					
					<div class="share-open-blog">
						<div class="blog-share-btn">
							<p>Share blog on -</p>
							<ul>
								<li><a href="https://www.facebook.com/sharer.php?u=<?= base_url($blogs['blog_slug']) ?>" target="_blank"><img src="<?= assets('svg/facebook.png') ?>"></a>
							</li>
							<li><a href="https://api.whatsapp.com/send?text=<?= $blogs['title'] ?> <?= base_url($blogs['blog_slug']) ?>" target="_blank"><img src="<?= assets('svg/whtapp.png') ?>"></a>
						</li>
						<li><a href="https://twitter.com/share?url=<?= base_url($blogs['blog_slug']) ?>&text=<?= $blogs['title'] ?>&hashtags=<?= $blogs['title'] ?>" target="_blank"><img src="<?= assets('svg/twitter.png') ?>"></a>
					</li>
				</ul>
				<a href="<?= base_url('blogs') ?>" style="background-color: <?= $blogs['background'] ?>" class="vl">View all blogs</a>
			</div>
		</div>
	</div>
</div>
</div>
<div class="all-blog-list check-color" data-color="<?= $blogs['background'] ?>" style="background-color: <?= $blogs['background'] ?>">
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="more-blog-list">
				<div class="more-blog" style="background-color: <?= $blogs['cat_color'] ?>">
					<a href="<?= $single_blog['blog_slug'] ?>">
						<div class="more-blog-img text-center">
							<img src="<?= $single_blog['image'] ?>">
							<div class="more-img">
								<img src="<?= $single_blog['blogger_image'] ?>">
							</div>
						</div>
						<div class="blog-text text-center">
							<p><?= $single_blog['title'] ?></p><br>
							<p><?= $single_blog['sub_title'] ?></p>
						</div>
					</a>
				</div><br>
			</div>
		</div>
		<!-- <div class="col-lg-4 col-md-4 col-sm-6 col-6">
			<div class="advt text-center" style="background-color: <?= $blogs['cat_color'] ?>">
				<p class="advt-heading">For advertisement space area</p>
				<p class="plz-contact">Pleace contact :</p>
				<p class="contact-no"><b><i class="fas fa-phone-alt"></i>9737987455</p></b>
				<h4 class="sponser">Sponser Add</h4>
				<?= img(['src' => 'assets/images/'.$this->main->check('advertisements', ['id' => 1], 'advertisement'), 'height' => 100, 'width' => 100]) ?>
			</div>
			
		</div> -->
	</div>
</div>
</div>
</div>
</div>