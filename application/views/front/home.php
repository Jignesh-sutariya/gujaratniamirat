<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<section class="header check-color" data-color="#fce373">
	<div class="container-fluid">
		<div class="main-header text-center">
			<div class="header-img">
				<img src="<?= assets('images/gif.gif') ?>" id="gif-img">
				<img src="<?= assets('images/namste.png') ?>" id="main-img">
			</div>
			<span class="social-menu">
				<ul>
					<li><a href=https://www.facebook.com/gujaratniamirat-513185555887215/><i class="fab fa-facebook-f" target="_blank"></i></a></li>
					<li>
					<a href=https://mobile.twitter.com/gujaratniamirat><i class="fab fa-twitter"></i></a>
					</li>
					<li><a href="https://youtube.com/channel/UCCvHs_611-ZbMsf4bFHejpg"><i class="fab fa-youtube"></i></a>
					</li>
					<li><a href="http://www.instagram.com/gujaratniamirat"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</span>
			<br>
			<div class="header-category">
				<div class="cat-1 callout-title">
					<a href="<?= base_url('bio-world') ?>"><img src="<?= assets('images/bio-world-final_1.png') ?>"></a>
				</div>
				<div class="cat-2 callout-title">
					<a href="<?= base_url('blogs') ?>"><img src="<?= assets('images/blog1.png') ?>"></a>
				</div>
				<div class="cat-3 callout-title">
					<a href="<?= base_url('join-us') ?>"><img src="<?= assets('images/Frame 70.png') ?>"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog-part check-color" data-color="#cca69a">
	<div class="container-fluid">
		<div class="blogHeader text-center">
			<img src="<?= assets('images/123.png') ?>" id="updown">
		</div>
		<div class="blog-category">
			<div class="main-header-cat text-center web-scroll">
				<?php foreach ($cats as $cat): ?>
				<div class="main-cat-horizontal">
					<a href="<?= base_url($cat['cat_slug']) ?>">
						<img src="<?= $cat['cat_image'] ?>">
					</a>
				</div>
				<?php endforeach ?>
			</div>
			<div class="main-header-cat text-center mobile-scroll responsive">
				<?php foreach ($cats as $cat): ?>
				<div class="main-cat-horizontal">
					<a href="<?= base_url($cat['cat_slug']) ?>">
						<img src="<?= $cat['cat_image'] ?>">
					</a>
				</div>
				<?php endforeach ?>
			</div>
			<div class="blog-slider">
				<div class="owl-carousel">
					<?php foreach ($blogs as $blog): ?>
					<div class="item">
						<div class="blog-on-home blog-on-home-slider-div">
							<a href="<?= base_url($blog['blog_slug']) ?>">
								<img src="<?= $blog['image'] ?>">
								<p class="text-center"><b>
									<?= $blog['title'] ?>
								</b></p>
							</a>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="interview-part check-color" data-color="#f37449">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-sm-12" style="background-color: #9cd08e;">
			<div class="latest-video-1">
				<?php foreach ($interviews as $k => $interview): ?>
				<?php if ($k == 0): ?>
				<iframe width="100%" height="520" src="<?= $interview['youtube_url'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12">
			<div class="latest-video-2">
				<h1 class="text-center">Interaction</h1>
				<div class="video-part text-center">
					<?php foreach ($interviews as $k => $interview): ?>
					<?php if ($k > 0): ?>
					<div class="video-1">
						<iframe id="video-1" width="250" height="220" src="<?= $interview['youtube_url'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
						<div class="video-details">
							<p><?= $interview['title'] ?></p>
						</div>
					</div>
					<?php endif ?>
					<?php endforeach ?>
				</div>
				<div class="more-video text-center">
					<a href="<?= base_url('interview') ?>"><img src="<?= assets('images/video.png') ?>">Our more videos</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="check-color" data-color="#fce373">
	<div class="contact-part">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12">
				<div class="newsletter text-center">
					<h5>Newsletter</h5>
					<br/>
					<h4>Gujarat Ni Amirat likes to send you emails</h4><br>
					<?php if (!empty($this->session->success)): ?>
					<div class="col-12 ml-2">
						<div class="alert alert-success">
							<?= $this->session->success ?>
						</div>
					</div>
					<?php endif ?>
					<?php if (!empty($this->session->error)): ?>
					<div class="col-12 ml-2">
						<div class="alert alert-danger">
							<?= $this->session->error ?>
						</div>
					</div>
					<?php endif ?>
					<?= form_open() ?>
					<input type="text" name="name" placeholder="Name">
					<input type="email" name="email" placeholder="Email"><br>
					<div class="sign-btn">
						<button type="submit" class="btn btn-primary">Signup</button>
					</div>
					<?= form_close() ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12">
				<div class="contact">
					<h2 class="text-center">Contact Us</h2>
					<p class="text-center"><!-- The incredible Gujarat ના માધ્યમ દ્વારા પ્રથમ તબક્કામાં પ્રકાશિત થયેલ પુસ્તકનું મુલ્ય ૨૫૦ છે. કમાણીના ઉદેશ્ય કરતા ગુજરાત રાજ્યના પ્રસાર-પ્રચારને આધારીત આ પુસ્તક ગુજરાતના દરેક ખૂણે મળી રહે તેવા ઉદેશ્ય હેઠળ POST ની સુવિધા અને તેનો નિભાવ ખર્ચ THE INCREDIBLE GUJARAT પર રહેશે.-->જીવનમાં એક અવસર મળવાનો છે અને જો તે અવસર સમાજ, ધર્મ કે દેશના હિત માટે ખર્ચ કરી શકીયે તો ઘર આંગણે જ ગંગા - જમના - સરસ્વતી છે, માટે 'ગુજરાતની અમીરાત' સાથે પ્રત્યક્ષ અને પરોક્ષ જોડાઈ ન માત્ર પોતાના માટે પણ સાથે દેશ ઉન્નતિ માટે ભાગીદાર બની સમાજની રક્ષા કરીયે. યદા... યદા...હિ...ધર્મસ્ય<br><br>Cont. no: 9737987455 <br><!-- Time : 8:00 AM to 12:00 PM 4:00 PM to 9:00PM  -->
						
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<footer>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="copywrite">
						<p>Copyrights © 2021 Gujarat Ni Amirat. All rights reserved | Powered by Densetek InfoTech</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="foot-menu text-center">
						<ul>
							<li><a href="<?= base_url('terms') ?>">Terms</a></li>
							<li><a href="<?= base_url('about') ?>">About us</a></li>
							<li><a href="<?= base_url('refund') ?>">Refund Policy</a></li>
							<li><a href="<?= base_url('contact') ?>">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-2">
					<div class="social-menu text-center">
						<a href=https://www.facebook.com/gujaratniamirat-513185555887215/><i class="fab fa-facebook-f" target="_blank"></i></a>
						<a href=https://mobile.twitter.com/gujaratniamirat><i class="fab fa-twitter"></i></a>
						<a href="https://youtube.com/channel/UCCvHs_611-ZbMsf4bFHejpg"><i class="fab fa-youtube"></i></a>
						<a href="http://www.instagram.com/gujaratniamirat"><i class="fab fa-instagram"></i></a>
						
					</div>
				</div>
			</div>
		</footer>
	</div>
</section>