<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'blog/landing/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
|--------------------------------------------------------------------------
| Route Custom
|--------------------------------------------------------------------------
*/
$route['admin'] = 'admin/home';
$route['login'] = 'admin/auth';
$route['register'] = 'admin/auth/register';
$route['logout'] = 'admin/logout';
$route['forget'] = 'admin/auth/forget';
$route['admin/menu'] = 'admin/halaman/menu';
$route['admin/kepala'] = 'admin/preferences';
$route['admin/profil'] = 'admin/preferences/profil';
$route['admin/setelan/(:any)'] = 'admin/user/setelan/$1';
$route['artikel'] = 'blog/artikel/index';
$route['artikel/:num'] = 'blog/artikel/index/:num';
$route[':num'] = 'blog/landing/index/:num';
$route['(:num)/(:num)/(:any)'] = "blog/artikel/getartikel/$1/$2/$3";
$route['arsip/(:num)/(:num)'] = "blog/artikel/getarchive/$1/$2/index";
$route['arsip/(:num)/(:num)/(:num)'] = "blog/artikel/getarchive/$1/$2/index/$3";
$route['pages/(:any)'] = "blog/artikel/readmore/$1/$2";
$route['sambutan'] = "blog/artikel/sambutan";
$route['album/(:num)/(:num)'] = "blog/album/index/$1/$2";
$route['album/(:num)'] = "blog/album/detail/$1";
$route['video/(:num)/(:num)'] = "blog/video/index/$1/$2";
