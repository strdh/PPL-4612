<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//USERS
$route['default_controller'] = 'user/home';
$route['createuser'] = 'auth/create';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['profile/(:any)'] = 'user/profile/$1';
$route['profile/edit/(:any)'] = 'user/editProfile/$1';
$route['home'] = 'user/home';
$route['game/(:any)'] = 'user/gameDetail/$1';

//ADMIN
$route['loginadmin'] = 'auth/loginAdmin';
$route['adminhome'] = 'admin/home';
$route['logoutadmin'] = 'auth/logoutadmin';
$route['management/games'] = 'admin/games';
$route['management/games/delete/(:any)'] = 'admin/deleteGame/$1';
$route['management/games/edit/(:any)'] = 'admin/editGame/$1';
// $route['management/games/category'] = 'admin/searchCategory';
$route['management/games/store'] = 'admin/storeGame';
$route['management/publishers'] = 'admin/publishers';
$route['management/publishers/create'] = 'admin/createPublisher';
$route['management/publishers/store'] = 'admin/storePublisher';
$route['management/publishers/edit/(:any)'] = 'admin/editPublisher/$1';
$route['management/publishers/delete/(:any)'] = 'admin/deletePublisher/$1';
$route['management/categories'] = 'admin/categories';
$route['management/categories/store'] = 'admin/storeCategories';
$route['management/categories/edit/(:any)'] = 'admin/editCategories/$1';
$route['management/categories/delete/(:any)'] = 'admin/deleteCategories/$1';
$route['management/users'] = 'admin/users';
$route['management/users/(:any)'] = 'admin/usersDetail/$1';
$route['management/users/logs/(:any)'] = 'admin/userLogs/$1';
$route['management/users/block/(:any)'] = 'admin/blockUser/$1';
$route['management/users/unblock/(:any)'] = 'admin/unblockUser/$1';
$route['management/forums'] = 'admin/forums';

$route['notfound'] = 'user/notFound';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

