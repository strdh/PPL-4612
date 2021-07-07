<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//USERS
$route['default_controller'] = 'welcome';
$route['createuser'] = 'auth/create';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['profile/(:any)'] = 'user/profile/$1';
$route['home'] = 'user/home';

//ADMIN
$route['loginadmin'] = 'auth/loginAdmin';
$route['adminhome'] = 'admin/home';
$route['logoutadmin'] = 'auth/logoutadmin';
$route['management/games'] = 'admin/games';
$route['management/publishers'] = 'admin/publisher';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

