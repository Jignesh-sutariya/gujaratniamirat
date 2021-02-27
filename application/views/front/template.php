<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?= APP_NAME.' | '.ucwords($title) ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?= link_tag('assets/images/favicon.png','icon','image/x-icon') ?>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<!--Google Font -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<!-- Font awsome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
		<?= link_tag('assets/owl/dist/assets/owl.carousel.min.css','stylesheet','text/css') ?>
		<?= link_tag('assets/owl/dist/assets/owl.theme.default.min.css','stylesheet','text/css') ?>
		<?= link_tag('assets/css/main.css','stylesheet','text/css') ?>
	</head>
	<body <?= (isset($cat)) ? 'style="background-color: '.$cat['background'].'"' : '' ?> >
		<div class="sidemenu">
			<ul>
				<li>
					<div class="quicklinks" id="you-can-write">
						<a class="change-color" href="<?= base_url('you-can-write') ?>" data-toggle="tooltip" data-placement="right" title="You can write">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="30" height="30" x="0" y="0" viewBox="0 0 511.99864 511" style="enable-background:new 0 0 512 512;" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m24.859375 312.96875c3.820313 1.910156 7.933594 3.230469 12.175781 3.96875l-6.609375 9.4375c-1.335937 1.910156-2.207031 4.101562-2.550781 6.402344l-9.839844 66.359375c-.832031 5.621093 1.578125 11.230469 6.234375 14.488281 4.660157 3.261719 10.753907 3.605469 15.746094.902344l55.574219-30.09375c7.675781 13.867187 22.457031 23.28125 39.398437 23.28125 11.515625 0 22.035157-4.347656 30-11.484375 7.96875 7.136719 18.488281 11.484375 30 11.484375 24.816407 0 45.003907-20.1875 45.003907-45v-5.742188c27.902343 13.578125 58.972656 20.742188 90 20.742188 32.050781 0 63.835937-7.351563 92.003906-21.246094v36.246094c0 5.199218 2.691406 10.027344 7.113281 12.761718 4.414063 2.726563 9.9375 2.984376 14.59375.65625l60.003906-30c5.082031-2.542968 8.292969-7.734374 8.292969-13.417968v-180.003906c0-8.285157-6.71875-15-15-15-23.894531 0-81.863281 0-103.53125 0l-105.816406-51.777344 40.203125-57.414063c4.746093-6.78125 3.101562-16.140625-3.6875-20.890625l-49.148438-34.417968c-6.78125-4.746094-16.140625-3.101563-20.890625 3.683593-6.351562 9.070313-46.882812 66.957031-53.191406 75.964844-12.304688-6.464844-27.058594-6.433594-36.417969-2.371094l-57.078125 24.796875c-8.273437 3.597656-15.207031 9.519532-20.042968 17.132813l-81.90625 128.828125c-5.320313 8.371094-7.523438 22.734375-3.203126 35.699218 3.800782 11.402344 11.816407 20.644532 22.570313 26.023438zm27.253906 60.894531 4.921875-33.179687 13.414063-19.160156c5.75 8.394531 13.574219 15.25 22.730469 19.84375l-11.570313 16.523437zm82.875 3.855469c-8.269531 0-15-6.730469-15-15.003906v-7.332032l5.371094-7.667968h24.628906v15c0 8.273437-6.726562 15.003906-15 15.003906zm60.003907 0c-8.273438 0-15-6.730469-15-15.003906v-15h30v15c0 8.273437-6.730469 15.003906-15 15.003906zm287.007812-24.273438-30.003906 15v-170.734374h30.003906zm-98.597656-157.261718c2.054687 1.003906 4.308594 1.527344 6.59375 1.527344h32v125.53125c-10.109375 3.929687-41.5 24.472656-92 24.472656-53.535156 0-86.507813-23.710938-98.296875-28.417969-2.140625-1.070313-4.5-1.582031-6.707031-1.582031h-105.003907c-15.339843 0-28.019531-11.574219-29.78125-26.449219.46875-2.175781.425781-4.410156-.070312-6.546875 1.507812-15.140625 14.320312-27.003906 29.851562-27.003906h92.578125c31.363282 0 60.855469-12.214844 83.035156-34.394532 5.855469-5.859374 5.855469-15.355468 0-21.214843-5.859374-5.859375-15.355468-5.859375-21.214843 0-16.515625 16.511719-38.46875 25.609375-61.820313 25.609375h-3.179687l60.84375-86.898438zm-147.71875-110.640625 24.574218 17.210937-87.496093 124.960938h-36.625c12.753906-18.214844 87.847656-125.460938 99.546875-142.171875zm34.414062-49.148438 24.578125 17.207031-17.210937 24.578126-24.574219-17.210938zm-238.804687 230.1875 81.421875-128.066406c1.613281-2.539063 3.925781-4.511719 6.683594-5.710937l56.363281-24.488282c2.503906-.734375 5.085937-.785156 7.523437-.242187l-87.289062 124.660156c-18.449219 8.082031-32.082032 25.175781-35.285156 45.691406-2.742188 7.703125-14.660157 11.59375-22.433594 7.707031-7.316406-3.65625-10.222656-12.339843-6.984375-19.550781zm0 0" fill="#fce373" data-original="#000000" style="" class=""/></g></svg>
						</a>
					</div>
				</li>
				<li>
					<div class="quicklinks" id="contibution for india">
						<a class="change-color" href="<?= base_url('nation') ?>" data-toggle="tooltip" data-placement="right" title="Contibution for india">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="27" height="27" x="0" y="0" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
								<g>
									<g xmlns="http://www.w3.org/2000/svg">
										<g>
											<path d="M359.422,0.001c-82.522,0-149.746,65.511-152.491,147.379c-0.096,2.83,0.615,5.593,1.982,8.011L41.597,375.545    c-17.222,22.66-18.042,53.432-3.517,76.8L4.47,485.954c-5.96,5.958-5.96,15.619,0,21.578c5.958,5.959,15.619,5.959,21.578,0    l33.622-33.622c23.63,14.684,54.34,13.556,76.788-3.504l220.115-167.288c2.459,1.426,5.271,2.167,8.187,2.066    c81.817-2.882,147.241-70.236,147.241-152.603C512.001,68.448,443.554,0.001,359.422,0.001z M69.203,442.797    c-12.459-12.459-14.335-32.068-4.819-46.633l51.454,51.453C101.273,457.134,81.662,455.257,69.203,442.797z M140.431,429.056    l-57.486-57.485l112.393-147.886l92.978,92.978L140.431,429.056z M312.837,298.028l-98.863-98.862l16.367-21.535l104.03,104.03    L312.837,298.028z M370.156,274.292l-1.843-1.843c-0.001-0.001-0.003-0.003-0.004-0.005    c-4.764-4.765-125.248-125.248-130.498-130.498c2.065-24.256,11.084-46.349,25.044-64.355L434.43,249.167    C416.445,263.14,394.38,272.184,370.156,274.292z M455.991,227.572L284.435,56.016c20.667-16.019,46.671-25.499,74.986-25.499    c67.306,0.001,122.063,54.758,122.063,122.064C481.484,180.883,472.005,206.891,455.991,227.572z" fill="#fce373" data-original="#000000" style=""/>
										</g>
									</g>
									<g xmlns="http://www.w3.org/2000/svg">
										<g>
											<path d="M220.249,291.752c-5.958-5.959-15.619-5.959-21.578,0l-43.155,43.156c-5.959,5.959-5.959,15.619,0,21.578    c5.958,5.958,15.619,5.959,21.578,0l43.155-43.156C226.208,307.371,226.208,297.711,220.249,291.752z" fill="#fce373" data-original="#000000" style=""/>
										</g>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</li>
				<li>
					<div class="wrap">
						<div class="overlay" id="myNav">
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
							<div class="overlay-content">
								<a href="<?= base_url('bio-world') ?>">Bio World</a><hr>
								<a href="<?= base_url('blogs') ?>">Blog Vlog</a><hr>
								<a href="<?= base_url('join-us') ?>">Join us for save india</a><hr class="line">
								<a href="<?= base_url() ?>">Home</a>
							</div>
						</div>
						<button id="change-color" onclick="openNav()">
						<div id="line-1"></div>
						<div id="line-2"></div>
						<div id="line-3"></div>
						</button>
					</div>
				</li>
				<li>
					<div class="quicklinks" id="Gallery">
						<a class="change-color" href="<?= base_url('gallery') ?>" data-toggle="tooltip" data-placement="right" title="Gallery">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="27" height="27" x="0" y="0" viewBox="0 0 512 511" style="enable-background:new 0 0 512 512;" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m231.898438 198.617188c28.203124 0 51.152343-22.945313 51.152343-51.148438 0-28.207031-22.949219-51.152344-51.152343-51.152344-28.203126 0-51.148438 22.945313-51.148438 51.152344 0 28.203125 22.945312 51.148438 51.148438 51.148438zm0-72.300782c11.664062 0 21.152343 9.488282 21.152343 21.152344 0 11.660156-9.488281 21.148438-21.152343 21.148438-11.660157 0-21.148438-9.488282-21.148438-21.148438 0-11.664062 9.488281-21.152344 21.148438-21.152344zm0 0" fill="#fce373" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m493.304688.5h-474.609376c-10.308593 0-18.695312 8.386719-18.695312 18.695312v401.726563c0 10.308594 8.386719 18.695313 18.695312 18.695313h474.609376c10.308593 0 18.695312-8.386719 18.695312-18.695313v-401.726563c0-10.308593-8.386719-18.695312-18.695312-18.695312zm-11.304688 30v237.40625l-94.351562-94.355469c-6.152344-6.140625-16.15625-6.136719-22.304688.011719l-133.441406 133.441406-85.238282-85.234375c-2.980468-2.984375-6.945312-4.628906-11.164062-4.628906-4.214844 0-8.175781 1.640625-11.15625 4.621094l-94.34375 94.34375v-285.605469zm-452 379.117188v-51.085938l105.5-105.5 85.234375 85.234375c2.984375 2.984375 6.949219 4.632813 11.167969 4.632813 4.210937 0 8.175781-1.644532 11.152344-4.625l133.445312-133.445313 105.503906 105.503906v99.285157zm0 0" fill="#fce373" data-original="#000000" style=""/></g></svg>
						</a>
					</div>
				</li>
				<li>
					<div class="quicklinks">
						<a class="change-color" href="<?= base_url('upcoming') ?>" data-toggle="tooltip" data-placement="right" title="Upcoming books">
							<svg style="stroke: #fce373" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="27" height="27" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g xmlns="http://www.w3.org/2000/svg"><g><path d="m18.5 20c-.061 0-.121-.011-.18-.033l-13-5c-.193-.074-.32-.26-.32-.467v-6c0-.207.127-.393.32-.467l13-5c.155-.06.326-.038.463.055.136.093.217.247.217.412v16c0 .165-.081.319-.217.412-.085.058-.183.088-.283.088zm-12.5-5.844 12 4.616v-14.544l-12 4.616z" data-original="#000000" style=""/></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="m5.5 15h-3.5c-1.103 0-2-.897-2-2v-3c0-1.103.897-2 2-2h3.5c.276 0 .5.224.5.5v6c0 .276-.224.5-.5.5zm-3.5-6c-.552 0-1 .448-1 1v3c0 .552.448 1 1 1h3v-5z" data-original="#000000" style=""/></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="m7.5 22h-3c-.249 0-.46-.183-.495-.43l-1-7c-.039-.273.151-.526.425-.565.268-.034.526.151.565.425l.939 6.57h2.006l-.668-5.954c-.03-.274.167-.521.441-.553.265-.029.521.167.553.441l.73 6.51c.016.142-.029.283-.124.389-.094.106-.229.167-.372.167z" data-original="#000000" style=""/></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="m20.5 9c-.161 0-.319-.078-.416-.223-.153-.229-.091-.54.139-.693l3-2c.228-.152.539-.092.693.139.153.229.091.54-.139.693l-3 2c-.085.057-.181.084-.277.084z" data-original="#000000" style=""/></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="m23.5 18c-.096 0-.192-.027-.277-.084l-3-2c-.229-.153-.292-.464-.139-.693.154-.23.466-.291.693-.139l3 2c.229.153.292.464.139.693-.097.145-.255.223-.416.223z" data-original="#000000" style=""/></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="m23.5 12.5h-3c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h3c.276 0 .5.224.5.5s-.224.5-.5.5z" data-original="#000000" style=""/></g></g></g></svg>
						</a>
					</div>
				</li>
			</ul>
		</div>
		<?= $contents ?>
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="<?= assets('owl/dist/owl.carousel.min.js') ?>"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script type="text/javascript">
			$('.responsive').slick({
		dots: false,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 2000,
		arrows:false,
		slidesToShow: 6,
		slidesToScroll: 1,
		responsive: [
		{
		breakpoint: 1024,
		settings: {
		slidesToShow: 3,
		slidesToScroll: 1,
		infinite: true,
		dots: true
		}
		},
		{
		breakpoint: 600,
		settings: {
		slidesToShow: 4,
		slidesToScroll: 1
		}
		},
		{
		breakpoint: 480,
		settings: {
		slidesToShow: 4,
		slidesToScroll: 1
		}
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
		]
		});
		</script>
		<script type="text/javascript">
			$(function () {
				$('[data-toggle="tooltip"]').tooltip();
			})
			$(document).ready(function(){
				$(".owl-carousel").owlCarousel({
					loop: true,
					autoplay: true,
					smartSpeed: 1000,
					autoplaySpeed: 10000,
					autoplayHoverPause: true,
					responsive: {
				0: {
				items: 1
				},
				600: {
				items: 2
				},
				1024: {
				items: 3
				},
				1366: {
				items: 3
				}
				}
				});
			});
			$.fn.isInViewport = function() {
			var elementTop = $(this).offset().top;
			var elementBottom = elementTop + $(this).outerHeight();
			var viewportTop = $(window).scrollTop();
			var viewportBottom = viewportTop + $('#myNav').height();
			return elementBottom > viewportTop && elementTop < viewportBottom;
			};
			$(window).on('resize scroll load', function() {
			$('.check-color').each(function() {
			if ($(this).isInViewport()) {
			$('.change-color > svg').css('stroke', $(this).data('color'));
			$('.change-color').find('path').attr('fill', $(this).data('color'));
			$('#change-color').css('background-color', $(this).data('color'));
			}
			});
			});
			function openNav() {
				document.getElementById("myNav").style.width = "100%";
			}
			
			function closeNav() {
				document.getElementById("myNav").style.width = "0%";
			}
		<?php if ($name == 'Join us'): ?>
		$('.owl-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		smartSpeed: 1000,
		autoplaySpeed: 10000,
		autoplayHoverPause: true
		});
		<?php endif ?>
		
		setInterval(() => {
		$(".blink-title").fadeIn(1000, () => {
		$(".blink-title").fadeOut(1000)
		});
		}, 1000);
		setInterval(() => {
		$(".cat-1").fadeIn(1000, () => {
		$(".cat-2").fadeIn(1000, () => {
		$(".cat-3").fadeIn(1000, () => {
		$(".cat-1").fadeOut(1000, () => {
		$(".cat-2").fadeOut(1000, () => {
		$(".cat-3").fadeOut(1000)
		});
		});
		});
		});
		});
		}, 1000);
		</script>
		<?php if ($_SERVER['HTTP_HOST'] != 'localhost'): ?>
		<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-messaging.js"></script>
		<script>
		// Initialize Firebase
		/*Update this config*/
		var config = {
		apiKey: "AIzaSyC_syHdgbJ40w9GxN2dz_weHXuDB1QQLVs",
			authDomain: "gujaratniamirattest.firebaseapp.com",
			projectId: "gujaratniamirattest",
			storageBucket: "gujaratniamirattest.appspot.com",
			messagingSenderId: "299403742311",
			appId: "1:299403742311:web:758122231cd20f42cb58c2",
			measurementId: "G-X24TMKZQY8"
		};
		firebase.initializeApp(config);
		//Retrieve Firebase Messaging object
		const messaging = firebase.messaging();
		messaging.requestPermission()
		.then(function() {
		console.log('Notification permission granted.');
		// TODO(developer): Retrieve an Instance ID token for use with FCM.
		if(isTokenSentToServer()) {
		console.log('Token already saved.');
		} else {
		getRegToken();
		}
		})
		.catch(function(err) {
		console.log('Unable to get permission to notify.', err);
		});
		function getRegToken(argument) {
		messaging.getToken()
		.then(function(currentToken) {
		if (currentToken) {
		//saveToken(currentToken);
		var token = currentToken;
		var device_id = '<?php echo md5($_SERVER['HTTP_USER_AGENT']); ?>';
		// console.log(token, device_id);
		saveToken(token, device_id);
		} else {
		console.log('No Instance ID token available. Request permission to generate one.');
		//setTokenSentToServer(false);
		}
		})
		.catch(function(err) {
		console.log('An error occurred while retrieving token. ', err);
		// setTokenSentToServer(false);
		});
		}
		function setTokenSentToServer(token, device_id) {
		window.localStorage.setItem('sentToServer', sent ? 1 : 0);
		}
		function isTokenSentToServer() {
		return window.localStorage.getItem('sentToServer') == 1;
		}
		function saveToken(currentToken, deviceid) {
		$.ajax({
		url: 'save-token',
		method: 'post',
		data: {'device_id':deviceid, 'token':currentToken}
		}).done(function(result){
		console.log(result);
		})
		}
		messaging.onMessage(function(payload) {
		console.log("Message received. ", payload);
		var notificationTitle = payload.data.title;
		const notificationOptions = {
		body: payload.data.body,
		icon: payload.data.icon,
		image: payload.data.image,
		click_action: "<?= base_url() ?>"+ payload.data.url, // To handle notification click when notification is moved to notification tray
		data: {
		click_action: "<?= base_url() ?>"+ payload.data.url
		}
		};
		var notification = new Notification(notificationTitle,notificationOptions);
		});
		</script>
		<?php endif ?>
		<?php if (!empty($this->session->success)): ?>
		<!-- The Modal -->
		<div class="modal fade " id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccessTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalSuccessTitle">Success</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h6 class="text-center"><?= $this->session->success ?></h6>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$("#modalSuccess").modal("show");
		</script>
		<?php endif ?>
		<?php if (!empty($this->session->error)): ?>
		<!-- The Modal -->
		<div class="modal fade " id="modalError" tabindex="-1" role="dialog" aria-labelledby="modalErrorTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalErrorTitle">Error</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h6 class="text-center"><?= $this->session->error ?></h6>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$("#modalError").modal("show");
		</script>
		<?php endif ?>
	</body>
</html>