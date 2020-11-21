<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'web/home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['login'] = 'authentication';
$route['auth'] = 'web/authentication';
$route['logout'] = 'home/logout';
$route['join'] = 'web/register/index';
$route['signup'] = 'web/register/signup';
$route['exist'] = 'web/register/user_exist';
$route['forgotten'] = 'web/authentication/forgotten';
$route['newpassword'] = 'web/authentication/newpassword';
$route['reset'] = 'web/authentication/reset';

// Website ROUTING
$route['home'] = 'web/home/index';
$route['about'] = 'web/home/about';
$route['privacy'] = 'web/home/privacy';
$route['term'] = 'web/home/term';
$route['return'] = 'web/home/return';
$route['event'] = 'web/home/event';
$route['faq'] = 'web/home/faqs';
$route['cat'] = 'web/home/cat';
$route['contact'] = 'web/home/contact';
$route['weaving'] = 'web/home/weaving';
$route['embroidery'] = 'web/home/embroidery';
$route['printing'] = 'web/home/printing';
$route['surface'] = 'web/home/surface';
$route['checkout'] = 'web/checkout/index';


$route['product'] = 'web/product/index';
$route['shop'] = 'web/shop/index';
$route['load'] = 'web/shop/load';
$route['side_filter'] = 'web/shop/load_filter';
$route['filter_data'] = 'web/shop/filter_data';
$route['gopayment'] = 'web/checkout/gopayment';
$route['payment'] = 'web/payment/payby_paytm';
$route['psback'] = 'web/payment/paytm_response';


$route['profile'] = 'web/profile/index';
$route['cancel/(:num)'] = 'web/profile/cancel/$1';
$route['view_order'] = 'web/profile/order_details';

$route['profile/update'] = 'web/profile/update';
$route['naddress'] = 'web/profile/address';
$route['saddress'] = 'web/profile/address_save';
$route['editaddress/(:any)'] = 'web/profile/edit_address/$1';




//  Admin Routing vai Admin

$route['admin'] = 'admin/dashboard';

// external
$route['autocities'] = 'external/auto_cities';
$route['autostates'] = 'external/auto_states';
$route['cities'] = 'external/get_cities';
$route['states'] = 'external/get_states';
$route['ifscdata'] = 'external/datayuge';
$route['file_upload'] = 'file_upload/index';
$route['gallery_upload'] = 'file_upload/add_gallery';
