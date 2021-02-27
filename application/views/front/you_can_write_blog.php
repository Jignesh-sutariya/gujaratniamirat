<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="open-post check-color" data-color="#f37449">
	<div class="container-fluid">
		
		<div class="post">
			
				<div class="row">
						<div class="wlogo">
							<img src="../assets/blog/gujaratniamirat.png">
						</div>
					<div class="post-heading col-lg-6 col-sm-12 col-12">
						<h4><b>Title :</b> <?= $blog['title'] ?></h4>
							<div class="title">
							<p></p>
						</div>
						<div class="topic">
							<p><b>Topic :</b> <?= $blog['topic'] ?></p>
						</div>
						<div class="written-by">
							<p><b>Written by :</b> <?= $blog['name'] ?></p>
						</div>
						<div class="share">
							<p><b>Share it - </b></p>
							<div class="share-btn">
								<ul>
									<li><a href="https://www.facebook.com/sharer.php?u=<?= base_url('you-can-write/'.$blog['blog_slug']) ?>" target="_blank"><img src="<?= assets('svg/facebook.png') ?>"></a></li>
									<li><a href="https://api.whatsapp.com/send?text=<?= $blog['title'] ?> <?= base_url('you-can-write/'.$blog['blog_slug']) ?>" target="_blank"><img src="<?= assets('svg/whtapp.png') ?>"></a></li>
									<li><a href="https://twitter.com/share?url=<?= base_url('you-can-write/'.$blog['blog_slug']) ?>&text=<?= $blog['title'] ?>&hashtags=<?= $blog['title'] ?>" target="_blank"><img src="<?= assets('svg/twitter.png') ?>"></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="post-details col-lg-6 col-sm-12 col-12 img-share-post">
						<img src="<?= $blog['image'] ?>" alt="img" >
						
					</div>
					<div class="col-lg-12 mt-lg-5 mt-md-5 mt-sm-3 mt-3">
						<div class="desc content-jus">
							<p><?= $blog['description'] ?></p>
						</div>
					</div>
				</div>
			
		</div>
	</div>
</div>