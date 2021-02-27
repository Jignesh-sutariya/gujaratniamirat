<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 check-color"  data-color="#cca69a" style="background-color: #cca69a">
			<div class="container">
				<div class="write-here-head">
					<h3>You can write here</h3>
					<div class="write-here">
						<?= form_open_multipart('you-can-write') ?>
							<div class="form-group">
								<label for="name"><b>Name</b></label>
								<input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?= set_value('name') ?>">
								<?= form_error('name') ?>
							</div>
							<div class="form-group">
								<label for="email"><b>Email id (<span class="blink-title">For get certificate</span>)</b></label>
								<input type="text" name="email" class="form-control" placeholder="Enter your email address" value="<?= set_value('email') ?>">
								<?= form_error('email') ?>
							</div>
							<div class="form-group">
								<label for="phone"><b>Phone number</b></label>
								<input type="text" name="phone" class="form-control" placeholder="Enter your Phone number" value="<?= set_value('phone') ?>" maxlength="10">
								<?= form_error('phone') ?>
							</div>
							<div class="form-group">
								<label for="file"><b>Upload Your Photo</b> (jpg,jpeg, png Only)</label>
								<input type="file" name="file" class="form-control-file">
							</div>
							<div class="form-group">
								<label for="topic"><b>Select one topic</b></label>
								<select class="form-control dropdown-primary" name="topic">
									<?php $topics = ['મારો દેશ મારું સ્વાભિમાન.', 'મને ગમતો ઈતિહાસ.', 'ધર્મ સ્થાન અને તેનો ઈતિહાસ.', 'ઇતિહાસનું મારું આદર્શ વ્યક્તિત્વ.', 'મારી માતૃભાષા.', 'મને ગમતું પર્યટન સ્થળ.', 'દેશને મજબુત કરવા શું બદલાવ આવવો જોઈએ?', 'બળાત્કાર/ભ્રષ્ટાચાર મુક્ત ભારત કેમ બનશે?', 'મને ગમતી વિસરાતી વાનગી.', 'ભવિષ્યનું ભારત યુવાનની કલમે.']  ?>
									<option value="" selected="" disabled="">Select one topic</option>
									<?php foreach ($topics as $topic): ?>
									<option value="<?= $topic ?>" <?= set_select('topic', $topic, False); ?>><?= $topic ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('topic') ?>
							</div>
							<div class="form-group">
								<label for="title"><b>Title (Maximum 25 words)</b></label>
								<input type="text" name="title" class="form-control" placeholder="Give the title (English Only)" maxlength="25" value="<?= set_value('title') ?>">
								<?= form_error('title') ?>
							</div>
							<div class="form-group">
								<label for="description"><b>Description (Minimum 500 words)</b></label><br>
								<textarea id="description" rows="6" placeholder="Type your description here. (Gujarati or English language)" name="description"><?= set_value('description') ?></textarea>
								<br>
								<?= form_error('description') ?>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12" style="background-color: #000">
			<div class="written-info">
				<h2><u>NOTE</u></h2>
				<p>
					આપશ્રીને <b>‘YOU CAN WRITE’</b> અભિયાન દ્વારા પોતાના વિચાર રજુ કરવા અમીરાત વ્યવસ્થા પૂરી પાડે છે. જે માટે આપ ભારતના ઈતિહાસ,પરંપરા,સંસ્કૃતિ વિશે લખી પોતાનું મત રજુ કરી શકો છો.<br><br>જે વિષય આપ દ્વારા રજુ કરવામાં આવ્યો હશે તેને અમારી ટીમની મદદથી અલગ અલગ પ્લેટફોર્મ પર રજુ કરવામાં આવશે. જે માટે આપને સર્ટીફીકેટ આપવામાં આવશે.
				</p>
			</div>
			<div class="img text-center">
				<img src="<?= assets('images/write-letter.png') ?>" alt="">
			</div>
			<div class="invite text-center">
				<h5>Invite your friends to join our campaign</h5>
			</div>
			<div class="invite-btn text-center">
				<ul>
					<li><a href="https://www.facebook.com/sharer.php?u=<?= base_url('you-can-write/') ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="https://api.whatsapp.com/send?text=<?= base_url('you-can-write/') ?>" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
					<li><a href="https://twitter.com/share? <?= base_url('you-can-write/') ?>" target="_blank"><i class="fab fa-twitter"></i></a></li></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="post-list check-color" data-color="#fce373">
	<div class="container-fluid">
		<h2><b>Latest Posts</b></h2>
		<div class="row">
			<?php if ($blogs): ?>
			<?php foreach ($blogs as $b): ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="post">
					<div class="post-heading">
						<div class="title">
							<p><b>Title :</b> <?= $b['title'] ?></p>
						</div>
						<div class="topic">
							<p><b>Topic :</b> <?= $b['topic'] ?></p>
						</div>
						<div class="written-by">
							<p><b>Written by :</b> <?= $b['name'] ?></p>
						</div>
						<div class="share">
							<p><b>Share it -</b></p>
							<div class="share-btn">
								<ul>
									<li><a href="https://www.facebook.com/sharer.php?u=<?= base_url('you-can-write/'.$b['blog_slug']) ?>" target="_blank"><img src="<?= assets('svg/facebook.png') ?>"></a></li>
									<!-- <li><a href="#"><img src="<?= assets('svg/instagram.png') ?>"></a></li> -->
									<li><a href="https://api.whatsapp.com/send?text=<?= $b['title'] ?> <?= base_url('you-can-write/'.$b['blog_slug']) ?>" target="_blank"><img src="<?= assets('svg/whtapp.png') ?>"></a></li>
									<li><a href="https://twitter.com/share?url=<?= base_url('you-can-write/'.$b['blog_slug']) ?>&text=<?= $b['title'] ?>&hashtags=<?= $b['title'] ?>" target="_blank"><img src="<?= assets('svg/twitter.png') ?>"></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="post-details">
						<div class="desc">
							<p><?= $b['details'] ?></p>
						</div>
						<div class="read-more">
							<a href="<?= base_url('you-can-write/'.$b['blog_slug']) ?>">
								Read more
							</a>
						</div>
					</div>
				</div>
				<hr>
			</div>
			<?php endforeach ?>
			<?php else: ?>
			NO Post Available.
			<?php endif ?>
		</div>
	</div>
</div>