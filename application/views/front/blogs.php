<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="blog-part">
		<div class="blog-sidebar">
			<div class="blog-sidebar-menu <?= ($this->agent->is_mobile()) ? 'responsive' : '' ?>">
				<?php foreach ($cats as $cat): ?>
				<div class="main-cat">
					<a href="<?= $cat['cat_slug'] ?>">
						<img src="<?= $cat['cat_image'] ?>">
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
		<div class="blog-list check-color" data-color="#6fab9e">
			<div class="blog-header-img text-center">
				<img src="<?= assets('images/blog1.png') ?>">
			</div>
			<?php foreach ($cats as $cat): ?>
			<?php if ($cat['blogs']): ?>
			<div class="blog-deck check-color" data-color="<?= $cat['background'] ?>" style="background-color: <?= $cat['background'] ?>">
				<p class="cat-name-list"><?= $cat['cat_name'] ?></p>
				<div class="owl-carousel">
					<?php foreach ($cat['blogs'] as $blog): ?>
					<div class="item">
						<div class="blog-cat-wise" style="background-color: <?= $cat['cat_color'] ?>">
							<a href="<?= $blog['blog_slug'] ?>">
								<div class="blog-img">
									<img src="<?= $blog['image'] ?>" alt="">
								</div>
								<div class="extra-img text-center">
									<img src="<?= $blog['blogger_image'] ?>">
								</div>
								<div class="blog-text text-center">
									<p><b>
										<?php

											$position=70;

											$message=$blog['title'];
											$post = substr($message, 0, $position);

											echo $post;
											echo "...";

											?>
										<!-- <?= $blog['title'] ?> -->
									</b></p>
								</div>
							</a>
							<?php $audio = explode('/', $blog['audio']); if (file_exists('assets/blog/'.end($audio))): ?>
							<div class="blog-audio text-center">
								<audio controls>
									<source src="<?= $blog['audio'] ?>" type="">
								</audio>
							</div><br>
							<?php endif ?>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			<?php endif ?>
			<?php endforeach ?>
		</div>
	</div>
</div>
<div class="contact-part check-color" data-color="#fce373">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-sm-12">
			<div class="newsletter text-center">
				<h5>Newsletter</h5>
				<br/>
				<h4>Gujarat Ni Amirat likes to send you emails</h4><br>
				<input type="text" name="name" placeholder="Name">
				<input type="email" name="email" placeholder="Email"><br>
				<div class="sign-btn">
					<button type="button" class="btn btn-primary">Signup</button>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12">
			<div class="contact">
				<h2 class="text-center">Contact Us</h2>
				<p class="text-center"><!-- The incredible Gujarat ના માધ્યમ દ્વારા પ્રથમ તબક્કામાં પ્રકાશિત થયેલ પુસ્તકનું મુલ્ય ૨૫૦ છે. કમાણીના ઉદેશ્ય કરતા ગુજરાત રાજ્યના પ્રસાર-પ્રચારને આધારીત આ પુસ્તક ગુજરાતના દરેક ખૂણે મળી રહે તેવા ઉદેશ્ય હેઠળ POST ની સુવિધા અને તેનો નિભાવ ખર્ચ THE INCREDIBLE GUJARAT પર રહેશે. -->જીવનમાં એક અવસર મળવાનો છે અને જો તે અવસર સમાજ, ધર્મ કે દેશના હિત માટે ખર્ચ કરી શકીયે તો ઘર આંગણે જ ગંગા - જમના - સરસ્વતી છે, માટે 'ગુજરાતની અમીરાત' સાથે પ્રત્યક્ષ અને પરોક્ષ જોડાઈ ન માત્ર પોતાના માટે પણ સાથે દેશ ઉન્નતિ માટે ભાગીદાર બની સમાજની રક્ષા કરીયે. યદા... યદા...હિ...ધર્મસ્ય<br><br>Cont. no: 9737987455 <br><!-- Time : 8:00 AM to 12:00 PM 4:00 PM to 9:00PM --></p>
			</div>
		</div>
	</div>
</div>
<div class="footer-bottom check-color" data-color="#fce373">
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
						<li><a href="<?= base_url('terms')?>">Terms</a></li>
						<li><a href="<?= base_url('about')?>">About us</a></li>
						<li><a href="<?= base_url('refund')?>">Refund Policy</a></li>
						<li><a href="<?= base_url('contact')?>">Contact</a></li>
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