<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['adminPanel'] = 'adminPanel/home';
$route['adminPanel/logout'] = 'adminPanel/home/logout';
$route['adminPanel/dashboard'] = 'adminPanel/home';
$route['adminPanel/blog']['post'] = 'adminPanel/blog/get';
$route['adminPanel/interview']['post'] = 'adminPanel/interview/get';
$route['adminPanel/blogCategory']['post'] = 'adminPanel/blogCategory/get';
$route['adminPanel/vendor']['post'] = 'adminPanel/vendor/get';
$route['adminPanel/bookPurchase']['post'] = 'adminPanel/bookPurchase/get';
$route['adminPanel/gallery']['post'] = 'adminPanel/gallery/get';
$route['adminPanel/nation']['post'] = 'adminPanel/nation/get';
$route['adminPanel/newsletter']['post'] = 'adminPanel/newsletter/get';
$route['adminPanel/youcanwrite']['post'] = 'adminPanel/youcanwrite/get';
$route['adminPanel/bioWorld']['post'] = 'adminPanel/bioWorld/get';

$route['adminPanel/profile'] = 'adminPanel/home/profile';
$route['adminPanel/changePassword'] = 'adminPanel/home/changePassword';
$route['adminPanel/forgotPassword'] = 'adminPanel/login/forgotPassword';
$route['adminPanel/checkOtp'] = 'adminPanel/login/checkOtp';
$route['adminPanel/backup'] = 'adminPanel/home/backup';


$route['blogs'] = 'home/blogs';
$route['join-us']['get'] = 'home/join_us';
$route['join-us']['post'] = 'home/join_us_post';
$route['bio-world']['get'] = 'home/bio_world';
$route['bio-world']['post'] = 'home/bio_world_post';
$route['nation']['get'] = 'home/nation';
$route['nation']['post'] = 'home/nation_post';
$route['gallery'] = 'home/gallery';
$route['terms'] = 'home/terms';
$route['about'] = 'home/about';
$route['refund'] = 'home/refund';
$route['contact'] = 'home/contact';
$route['upcoming'] = 'home/upcoming';
$route['inside-book/(:any)'] = 'home/inside_book/$1';

$route['you-can-write']['get'] = 'home/you_can_write';
$route['you-can-write/(:any)']['get'] = 'home/you_can_write/$1';
$route['you-can-write']['post'] = 'home/you_can_write_post';
$route['interview'] = 'home/interview';
$route['interview/(:any)'] = 'home/interview/$1';
$route['save-token']['post'] = 'home/save_token';
$route['success-paymen'] = 'home/success_payment';
$route['error-payment'] = 'home/error_payment';
$route['(:any)'] = 'home/blog/$1';