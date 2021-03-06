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
|	http://codeigniter.com/user_guide/general/routing.html
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


//$route['guest'] = 'Guest';
$route['page'] = 'Guest/page';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'Guest';
$route['perusahaan'] = 'perusahaanController';
$route['migrate'] = 'migrate';
$route['login'] = 'authController';
$route['logout'] = 'authController/logout';
$route['solusi'] = 'solusiController';
$route['solusi/(:num)'] = 'solusiController/show/$1';
$route['masalah'] = 'masalahController';
$route['masalah/create'] = 'masalahController/create';
$route['masalah/(:num)'] = 'masalahController/show/$1';
$route['permintaan'] = 'permintaanController';
$route['permintaan/(:num)/(:num)'] = 'permintaanController/show/$1/$2';
// $route['migrate'] = function(){
//     echo APPPATH;
// };
$route['migrate/(:num)'] = 'migrate/index/$1';


$route['page2'] = 'Guest/page2';
$route['page3'] = 'Guest/page3';
