<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="header check-color" data-color="#fce373">
		<div class="inside-vid text-center">
			<img src="<?= assets('images/1234.png') ?>">
			<div class="video text-center">
				<iframe width="75%" height="420" src="https://www.youtube.com/embed/RgFuyQGaVOQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<div class="buy-book check-color" data-color="#fce373">
			<div class="row">
				<div class="col-lg-8">
					<div class="book-part-1">
						<img src="<?= assets('images/book-purchase-final.png') ?>">
						<div class="book-form">
							<?= form_open('join-us') ?>
							<div class="form-group">
								<label for="name"><b>Name</b></label>
								<input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?= set_value('name') ?>">
								<?= form_error('name') ?>
							</div>
							<div class="form-group">
								<label for="email"><b>Email Id</b></label>
								<input type="text" name="email" class="form-control" placeholder="Enter your email address" value="<?= set_value('email') ?>">
								<?= form_error('email') ?>
							</div>
							<div class="form-group">
								<label for="phone"><b>Contact number</b></label>
								<input type="text" name="phone" class="form-control" placeholder="Enter your contact number" value="<?= set_value('phone') ?>" maxlength="10">
								<?= form_error('phone') ?>
							</div>
							<div class="form-group street">
								<label for="street"><b>Society / Appartment No.</b></label><br>
								<input type="text" name="street" class="form-control" placeholder="Society or appartment no." value="<?= set_value('street') ?>">
								<?= form_error('street') ?>
							</div>
							<div class="form-group place">
								<label for="place"><b>Nearby places</b></label><br>
								<input type="text" name="nearbyplace" class="form-control" placeholder="Nearby places or landmark" value="<?= set_value('nearbyplace') ?>">
								<?= form_error('nearbyplace') ?>
							</div>
							<div class="form-group city">
								<label for="city"><b>City</b></label><br>
								<input type="text" name="city" class="form-control" placeholder="City" value="<?= set_value('city') ?>">
								<?= form_error('city') ?>
							</div>
							<div class="form-group zip-code">
								<label for="pin"><b>Pin code</b></label><br>
								<input type="text" name="pincode" class="form-control" placeholder="Pin code" value="<?= set_value('pincode') ?>">
								<?= form_error('pincode') ?>
							</div>
							<div class="form-group">
								<label for="vendorid"><b>Vendor id (Only for vendor users)</b></label>
								<input type="text" name="vendorid" class="form-control" placeholder="Enter your vendor id" value="<?= set_value('vendorid') ?>">
								<?= $vendor_error ?>
							</div>
							<div class="form-group">
								<label for="book-count"><b>Select book quanitity</b></label>
								<select class="form-control" onchange="document.getElementById('price').innerHTML = (this.value > 0) ? 'Total amount : ₹ ' + (this.value * 300) : '' " name="book_qty">
									<option value="" disabled="" selected="">Select book quanitity</option>
									<option value="1" <?= set_select('book_qty', 1, False) ?>>1</option>
									<option value="2" <?= set_select('book_qty', 2, False) ?>>2</option>
									<option value="3" <?= set_select('book_qty', 3, False) ?>>3</option>
									<option value="4" <?= set_select('book_qty', 4, False) ?>>4</option>
									<option value="5" <?= set_select('book_qty', 5, False) ?>>5</option>
								</select>
								<?= form_error('book_qty') ?>
							</div>
							<div id="price">
								<?php if (!empty(set_value('book_qty')) && set_value('book_qty') > 0): ?>
								Total amount : ₹ <?= set_value('book_qty') * 300 ?>
								<?php endif ?>
							</div><br>
							<div class="pay-mode">
								<p><b>Select payment mode</b></p>
								<div class="form-check" id="opt1">
									<input type="radio" name="paymentmode" class="form-check-input" value="onlinepay" id="onlinepay" <?= set_radio('paymentmode', 'onlinepay') ?>>
									<label class="form-check-label" for="onlinepay">Online Payment</label>
								</div>
								<div class="form-check" id="opt2">
									<input type="radio" name="paymentmode" class="form-check-input" id="offlinepay" value="offlinepay" <?= set_radio('paymentmode', 'offlinepay', TRUE) ?>>
									<label class="form-check-label" for="offlinepay">Offline Payment</label>
								</div>
							</div>
							<?= form_error('paymentmode') ?>
							<p class="courior"><b>(Including free delivery)</b><br>
								<button type="submit" class="btn btn-primary">Submit</button>
								<?= form_close() ?>
							</div>
							<hr>
							<div class="vl"></div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="book-part-2 text-center">
							<p class="tagline text-center" style="margin-top: 20px;">
								यदा यदा हि धर्मस्य ग्लानिर्भवति भारत ।<br>
								अभ्युत्थानमधर्मस्य तदात्मानं सृजाम्यहम् ॥<br>
								परित्राणाय साधूनां विनाशाय च दुष्कृताम् ।<br>
								धर्मसंस्थापनार्थाय सम्भवामि युगे युगे ॥
							</p><br>
							<img src="<?= assets('images/Gujaratii.png') ?>"><br><br>
							<p class="tagline text-center">
								મેં નહીં બ્રાહ્મણ,મેં નહીં ક્ષત્રીય<br>
								મેં નહીં વૈશ્ય,મેં નહીં શુદ્ર<br>
								મેં હું તો કેવલ એક હિંદુ<br>
								મેં નહીં સમય યહ માંગ કર રહા<br>
								કી મેં હું તો કેવલ અબ એક હિંદુ
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="book-gallery check-color" data-color="#b48484">
				<div class="bookHeader text-center">
					<img src="<?= assets('images/123.png') ?>" id="updown">
				</div>
				<h1>Inside Book</h1>
				<div class="book-slider">
					<div class="owl-carousel">
						<div class="item">
							<div class="img-1 text-center">
								<a href="<?= base_url('inside-book/gujarat') ?>">
									<img src="<?= assets('images/book-1.jpg') ?>">
									<p>ગુજરાત</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-2 text-center">
								<a href="<?= base_url('inside-book/history') ?>">
									<img src="<?= assets('images/book-2.png') ?>">
									<p>ઈતિહાસ</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-3 text-center">
								<a href="<?= base_url('inside-book/tour') ?>">
									<img src="<?= assets('images/book-3.jpg') ?>">
									<p>ગુજરાતનું પર્યટન</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-4 text-center">
								<a href="<?= base_url('inside-book/festival') ?>">
									<img src="<?= assets('images/tarnetar.jpg') ?>">
									<p >ગુજરાતના<br>ઉત્સવ-પરંપરા</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-5 text-center">
								<a href="<?= base_url('inside-book/sorath') ?>">
									<img src="<?= assets('images/book-5.jpg') ?>">
									<p>સૌરાષ્ટ્ર</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-6 text-center">
								<a href="<?= base_url('inside-book/kutchh') ?>">
									<img src="<?= assets('images/book-6.jpg') ?>">
									<p>કચ્છ</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-7 text-center">
								<a href="<?= base_url('inside-book/girnar') ?>">
									<img src="<?= assets('images/book-7.jpeg') ?>">
									<p>ગીરનાર</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-8 text-center">
								<a href="<?= base_url('inside-book/culture') ?>">
									<img src="<?= assets('images/book-8.jpeg') ?>">
									<p>સાહિત્ય</p>
								</a>
							</div>
						</div><br>
					</div>
				</div>
				<div class="book-slider-mobile">
					<div class="owl-carousel">
						<div class="item">
							<div class="img-1-mobile text-center">
								<a href="<?= base_url('inside-book/gujarat') ?>">
									<img src="<?= assets('images/book-1.jpg') ?>">
									<p>ગુજરાત</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-2-mobile text-center">
								<a href="<?= base_url('inside-book/history') ?>">
									<img src="<?= assets('images/book-2.png') ?>">
									<p>ઈતિહાસ</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-3-mobile text-center">
								<a href="<?= base_url('inside-book/tour') ?>">
									<img src="<?= assets('images/book-3.jpg') ?>">
									<p>ગુજરાતનું પર્યટન</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-4-mobile text-center">
								<a href="<?= base_url('inside-book/festival') ?>">
									<img src="<?= assets('images/tarnetar.jpg') ?>">
									<p >ગુજરાતના<br>ઉત્સવ-પરંપરા</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-5-mobile text-center">
								<a href="<?= base_url('inside-book/sorath') ?>">
									<img src="<?= assets('images/book-5.jpg') ?>">
									<p>સૌરાષ્ટ્ર</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-6-mobile text-center">
								<a href="<?= base_url('inside-book/kutchh') ?>">
									<img src="<?= assets('images/book-6.jpg') ?>">
									<p>કચ્છ</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-7-mobile text-center">
								<a href="<?= base_url('inside-book/girnar') ?>">
									<img src="<?= assets('images/book-7.jpeg') ?>">
									<p>ગીરનાર</p>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="img-8-mobile text-center">
								<a href="<?= base_url('inside-book/culture') ?>">
									<img src="<?= assets('images/book-8.jpeg') ?>">
									<p>સાહિત્ય</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="theroy check-color" data-color="#fce373">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6" style="background-color: #fce373;">
						<div class="gujarati">
							<h4 class="text-center"><b>સંકલ્પ</b></h4>
							<ul>
								<li>સમાજમાંથી જાતિવાદ દુર કરી ભાઈચારાનું વાતાવરણ ઊભું કરવું.</li>
								<li>સનાતન ધર્મની પરંપરા કે તેના મૂળ વિચારની સાચી સમજ લોક સુધી પહોચાડવી.</li>
								<li>સામાજિકતા-સાંસ્કૃતિક અને સ્વાસ્થની બાબતમાં સમાજને યોગ્ય પ્રણાલી સમજાવવી.</li>
								<li>કર્મકાંડ-ધાર્મિકવિધિ-ધર્મ સાથે જોડાયેલી અનેક ધર્મની બાબતની ખોટી માનસિકતા દુર કરવી.</li>
								<li>બદલાતા આધુનિક સમયમાં ધર્મની મૂળ પરિભાષા પડી ભાંગે કે વિસ્તરણ થઈ જાય તે પહેલાતેને રોકવી મૂળ સંકલ્પનો ભાગ છે.</li>
								<li>હિંદુ ધર્મ-સાધુ-સંત-બ્રાહ્મણ-પંડિત દેવી દેવતા આધારિત વિષયને મનોરંજનના માધ્યમથી ચિતરવામાં ન આવે તેની સક્રિયતા રજુ કરવી જરૂરી છે.</li>
								<li>સાધુ-સંત સમાજની સુરક્ષા ધર્મની પ્રાથમિકતા.</li>
							</ul>
							<p>     સમય હવે બદલાવો પડશે, હિંદુ થઈ હિંદુ ધર્મનું મહત્વ સમજવું પડશે. આધુનિક થઈ ભારતની મૂળ ઓળખ ઊભી કરવી પડશે, કારણ કે આજ સમયની માંગ છે કે સમાજમાંથી જાતિવાદ ડામવો પડશે ભાઈચારો ઊભો કરી હિંદુ તરીકેની ઓળખ ઊભી કરવી પડશે.</p>
							<p class="text-center">ધર્મની રક્ષા કરો ધર્મ તમારી રક્ષા જરૂર કરશે, તે વિચારનો પ્રસાર કરવાની જરૂર છે.</p>
							<h6 class="text-center"><b>અમીરાત દ્વારા થયેલ કામગીરી</b></h6>
							<p> <b>-</b> સમાજની સામાજિકતા વધુ મજબુત બનાવવાના ઉદેશ્યથી પુસ્તક ‘ગુજરાતની અમીરાત’ બાદ યુવા વિચારોમાં ભવિષ્યના ભારતની કલ્પના કેવી રીતે થઇ શકે?તે માટે <b>‘you can write’</b> અને <b>‘contribution for nation’</b> જેવા અભિયાન આધુનિક ભારતના યુવાનોને પોતાના વિચાર રજુ કરવાનું મંચ આપે છે.<br>
							સમાજ જાગૃતિ માટે ભારતની પરંપરા, સભ્યતા અને સંસ્કૃતિના મુલ્યોને સાચવવા અનેક કાર્યક્રમ અમીરાત પ્રોજેક્ટ આધારે દર્શાવી ચુક્યા છીએ. <b>-</b></p>
							<ul>
								<li>યોગ-આયુર્વેદ</li>
								<li>ભારતના ઉત્સવની સાચી વ્યાખ્યા</li>
								<li>માતૃભાષા</li>
								<li>સંસ્કૃતિ</li>
								<li>ટ્રાફિકના નિયમનું પાલન</li>
								<li>ચાઇનીઝ વસ્તુઓનો બહિષ્કાર</li>
								<li>ગૌ રક્ષા – સુરક્ષા</li>
								<li>Search my child</li>
							</ul><br>
							<h6 class="text-center"><b>WHO WE ARE?</b></h6>
							<p>ગુજરાતની અમીરાત દ્વારા સામાજિક સદભાવનાને સુદ્રઢ કરવા અને સમાજની કડવાશને દૂર કરવાની સાથે હિંદુ સમાજના એકત્રીકરણના ઉદેશ્ય સાથે સનાતન ધર્મની આપણી મૂળ પરિભાષાને અકબંધ રાખવા અનેક વિદ્વાનના સહયોગથી ગુજરાતની અમીરાત પોતાનું યોગદાન ધર્મહિત માટે આપવા કટિબદ્ધતા દર્શાવે છે. સમાજ સામાજિકતા-ધાર્મિકતા અને સ્વાસ્થ્યની બાબતમાં ભારતીય શૈલીથી સમૃદ્ધ બને તેવા ઉદેશ્યની આ મહાન કક્ષા છે. જે માટે આપશ્રી ને ‘ગુજરાતની અમીરાત’ સાથે જોડાયેલા રહેવાની વિંનતી કરવામાં આવે છે, કારણ કે આ અવસર છે ભારતીય સંસ્કૃતિ નજીક આવી પોતાના જીવનને ભારતીય દ્રષ્ટિએ સફળ બનાવી ભારતનું માન વધારી વિશ્વગુરુ તરફ પ્રયાણનો.</p>
							<p class="text-center"><b>‘મનુષ્ય જન્મ નથી અવસર છે, જો ના માનો તો જીવતર ઝેર છે અને જો માનો તો આ ઊજવવા જેવો પ્રસંગ છે.’</b></p>
							<h6 class="text-center"><b>પુસ્તક કેમ ખરીદવું?</b></h6>
							<p>તમે પુસ્તક ખરીદીને ન માત્ર ભારતની પરંપરા, ઈતિહાસ, ઉત્સવ-મેળા- તહેવારથી અવગત થશો. પણ સાથે આવનાર પેઢીને ભારતીય મુલ્ય ત્યાગ સમર્પણ ધરાવતી સંસ્કૃતિની નજીક લાવશો.<bR>
								તમે એવા શુરવીરના શોર્યરસથી ભરેલા જીવનચરિત્રથી અવગત થશો જે નિરશ જીવનને મોટીવેશનથી ભરી દેશે.<br>
								278 પેજ ધરાવતું આ પુસ્તક તમે 50 રૂ. ડિસ્કાઉન્ટ સાથે માત્ર 300/-માં ખરીદી શકશો.<br>
								તમારી એક સામાન્યનો ખરીદીનો પ્રયાસ ભારતને વિશ્વગુરુ તરફ લઇ જવા અમને પ્રેરણા આપશે.<br>
								જે વેગ આપશે અમારા મનોબળને જે દ્વારા અમે વર્તમાન ભારતની અનેક સામાજિક સમસ્યાને દુર કરવા કાર્યરત છીએ.<br>
							અમે કોઈપણ પ્રકારના ટ્રસ્ટ, સમિતિ, સંસ્થા કે NGO વર્તમાન સમયમાં ચલાવતા નથી કે કોઈ સાથે અમે જોડાયેલા નથી. અમે કોઈપણ પક્ષ કે વિપક્ષના સમર્થક નથી. આ કાર્ય અને પ્રોજેક્ટ માત્ર સામાજિક હિત અને ભારતીય સાંસ્કૃતિક વિરાસતની સાચી સમજ અને જાગૃતિ લોકોમાં ઉભી થાય તે માટે અમે ગતિશીલ છીએ. અમારો ઉદેશ્ય છે એવા ચક્રવ્યૂહને તોડવાનો જેના દુષણથી સમગ્ર હિંદુ સમાજ ગ્રષિત છે.</p>
							<div class="round-img text-center">
								<img src="<?= assets('images/Gujaratii.png') ?>">
							</div>
							<p>પ્રશ્નો ખુબ મોટા છે પણ સાથે તે પ્રશ્નોને દુર કરવાનું મનોબળ પણ અમે ઊંચું ધરાવીએ છીએ. નજીકના ભવિષ્યમાં ‘ગુજરાતની અમીરાત’ વિદ્વાનોની મદદથી સામાજિક હિત માટે પોતાની કાર્યક્ષમતા રજુ કરશે. માટે સમાજને નબળો પાડતા આ ચક્રવ્યૂહને તોડવા આપશ્રીને એક પુસ્તક ખરીદી કરવાની વિનંતી કરવામાં આવે છે.</p>
							<p class="text-center">ભલે કળિયુગ તેનું કામ કરતો રહે પણ યુગે યુગે ધર્મની સ્થાપના થતી રહેશે.</p>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="english">
							<h4 class="text-center"><b>Pledge</b></h4>
							<ul>
								<li>We should remove racism from the society, and should create the environment of brotherhood.</li>
								<li>Efforts should be made to pass on the true understanding of Sanatana Dharma to people.</li>
								<li>People should be guided properly for the matters related to culture, sociality and health.</li>
								<li>We must have the goal to create true understanding of rituals and religious rites.</li>
								<li>It is the part of the main resolution that in the changing times, the true definition of our religion doesn’t become bleak or it should not expand beyond limits.</li>
								<li>Hindu religion- it is essential to create awareness that the subjects related to saints, Brahmins, Pundits gods, goddesses should not be projected as the means of entertainment.</li>
								<li>To protect saints and the society, to give priority to the religion.</li>
							</ul>
							<p>Now we will have to bring change. Being a Hindu, we will have to understand the importance of Hindu religion. Even being modern, we will have to recreate the true image of India because it is the demand of the time that we have to abolish racism from the society and with the brotherhood, we will have to recreate our identity as a Hindu.<br>It is necessary to spread this thought-if you protect your religion, the religion will protect you.</p>
							<h6 class="text-center"><b>The work done by Amirat</b></h6>
							<p>After the publication of the book ‘Gujarat Ni Amirat’- how can the young mind visualize the future of India?<br>For this purpose the campaigns like- ‘You can Write’ and ‘Contribution for the Nation’ provide a platform to the youth to present their thoughts.<br>In order to bring social awareness, it is essential to preserve the tradition, culture and customs of India. For this purpose Amirat has conducted a number of projects like <b>-</b></p>
							<ul>
								<li>Yoga and Ayurveda</li>
								<li>The true definition of Indian Festivals</li>
								<li>Mother tongue</li>
								<li>Culture</li>
								<li>Following Traffic Rules</li>
								<li>Boycott of Chinese goods</li>
								<li>Protection of Cows</li>
								<li>Search my Child</li>
							</ul>
							<h6 class="text-center"><b>WHO WE ARE?</b></h6>
							<p>The campaign Gujarat Ni Amirat intends to strengthen social feelings by eradicating bitterness in the society. Along with this, we intend to unite Hindu society keeping intact the root ideals of our Sanatan Dharma. We are determined to fulfill the cause of religious welfare with the help of many learned men through the medium of Gujarat Ni Amirat.  It is our intention to see that the society becomes rich in the matters of religiousness, socialism and health through Indian ways. This is the highest peak of our goal. We therefore request you to remain associated with ‘Gujarat Ni Amirat’ because this is the time to come close to Indian cultural heritage and it is the occasion to make your life fruitful through Indian ways and proceed forward to the World Mentor by increasing the pride of India.</p>
							<p class="text-center"><b>‘Man is not birth, it is an occasion. If you don’t believe this, life is venomous and if you believe it then life is an occasion.’</b></p>
							<h6 class="text-center"><b>Why should you buy the book?</b></h6>
							<p>By buying the book, you will not only be acquainted with Indian tradition, history, fairs, festivals and celebrations; you  will also be able to bring the future generation closer to the values of sacrifice and dedication which are the true marks the Indian culture.<br>
								You will be acquainted with the bravery of such courageous men whowould fill your dull life with new zeal and motivation.<br>
								You will be able to buy 278 pages book with the discount of Rs.50- just for Rs. 300/-<br>
								Your purchase of the book will give us inspiration to make India Vishwaguru.<br>
							It would further boost our determination through which we are trying to remove many of the social problems.<br></p>
							<p>We do not run any trust, institution or NGO or we are not associated with any of these. We are not for or against any party. We run this program only for social welfare and for giving the true understanding of the rich culture of India to the people. Our intention is to break the vicious circle in which the Hindu society is trapped.<br></p>
							<div class="round-img text-center">
								<img src="<?= assets('images/english.png') ?>">
							</div>
							<p>The problems are huge but our determination rises higher than the problems. In the near future, Gujarat niAmirat will exhibit its capacities with the help of the learned personages.<br>
								You are requested to buy this book to break the vicious circle that weakens our society.<br>
							Let Kaliyug remain active but Dharma will be re-established in every Yug.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>