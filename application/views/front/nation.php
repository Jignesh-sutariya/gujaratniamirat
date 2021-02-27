<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="nation-part-1 check-color" data-color="#9cd08e">
		<h3>Contribution for nation</h3><br>
		<div class="inside-vid text-center">
			<iframe width="75%" height="420" src="https://www.youtube.com/embed/RgFuyQGaVOQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div><br>
		<div class="write-here text-center">
			<p style="font-size: 20px"><b>ભારત દેશ અને સામાજિક-ધાર્મિક-રાજકીય સમસ્યાથી પીડાય છે. જે સમસ્યાનું નિરાકરણ તમારા અર્થ પ્રમાણે કેવી રીતે રજુ કરી શકાય?</b></p>
			<p>તે માટે <b>‘ગુજરાતની અમીરાત’</b> તમને PLATFORM આપે છે. જે માટે આપશ્રી ભારતના ઈતિહાસ, પરંપરા, સંસ્કૃતિ, વિસરાતી-વાનગી કે સામાજિક અને રાજકીય વિષય પર વિડીયો બનાવી પોતાનું મત રજુ કરી શકો છો.<br><br></p>
			<p style="font-size: 20px;" class="text-center"><b>‘એક અવસર રાષ્ટ્રને સમર્પિત’</b></p>
		</div><br>
		<div class="platform">
			<h5><b>You can fill the form to get certificate</b></h5><br>
			
			<?= form_open('nation') ?>
			<div class="form-group">
				<label for="name"><b>Name </b></label><br>
				<input type="text" name="name" placeholder="Enter your name" value="<?= set_value('name') ?>">
			</div>
			<?= form_error('name') ?>
			<div class="form-group">
				<label for="phone"><b>Phone number </b></label><br>
				<input type="text" name="phone" placeholder="Enter your phone number" value="<?= set_value('phone') ?>" maxlength="10">
			</div>
			<?= form_error('phone') ?>
			<div class="form-group">
				<label for="email"><b>Email Id </b></label><br>
				<input type="text" name="email" placeholder="Enter your email address" value="<?= set_value('email') ?>">
			</div>
			<?= form_error('email') ?>
			<br>
			<button type="submit" class="btn btn-primary">Submit</button>
			<?= form_close() ?>
		</div><br>
	</div>
	<div class="nation-part-2 check-color" data-color="#9cd08e">
		<div class="persons text-center">
			<div class="images">
				<img src="<?= assets('images/1.jpg') ?>" alt="">
				<p class="text-center"><b>Sohan Master</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/2.jpg') ?>" alt="">
				<p class="text-center"><b>Manushree Patel</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/3.jpg') ?>" alt="">
				<p class="text-center"><b>Niketa Shukla</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/u1.png') ?>" alt="">
				<p class="text-center"><b>Mittal Shah</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/u2.png') ?>" alt="">
				<p class="text-center"><b>Shivani Vyas</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/u3.png') ?>" alt="">
				<p class="text-center"><b>Nisha Chavda</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/u4.png') ?>" alt="">
				<p class="text-center"><b>Mahoday Shree Sharnam Kumarji</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/stree1.png') ?>" alt="">
				<p class="text-center"><b>Nisarg Vyas</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/stree2.png') ?>" alt="">
				<p class="text-center"><b>Rutva Vaishnav</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/stree3.png') ?>" alt="">
				<p class="text-center"><b>Rinkal Patel</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/t1.png') ?>" alt="">
				<p class="text-center"><b>Paras Maru</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/t2.png') ?>" alt="">
				<p class="text-center"><b>Khushali Panchal</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/t3.png') ?>" alt="">
				<p class="text-center"><b>Akshat Rana</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/t4.png') ?>" alt="">
				<p class="text-center"><b>Tejas Ruparelia</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/moraribapu.jpg') ?>" alt="">
				<p class="text-center"><b>Shri Morari Bapu</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/sant1.png') ?>" alt="">
				<p class="text-center"><b>Hitansh Jain</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/sant2.png') ?>" alt="">
				<p class="text-center"><b>Paula Parekh</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/sant3.png') ?>" alt="">
				<p class="text-center"><b>Kamal Parmar</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/m1.png') ?>" alt="">
				<p class="text-center"><b>Arpita Pandya</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/m2.png') ?>" alt="">
				<p class="text-center"><b>Keyur Tanna</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/yoga.png') ?>" alt="">
				<p class="text-center"><b>Namrata Bulchandani</b></p>
			</div>
			<div class="images">
				<img src="<?= assets('images/a1.jpeg') ?>" alt="">
				<p class="text-center"><b>Gaurav Chudasama</b></p>
			</div>
		</div>
	</div>
</div>