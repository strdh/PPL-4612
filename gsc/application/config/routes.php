<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['createuser'] = 'auth/create';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['profile/(:any)'] = 'user/profile/$1';
$route['home'] = 'user/home';

$route['loginadmin'] = 'auth/loginAdmin';
$route['adminhome'] = 'admin/home';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

