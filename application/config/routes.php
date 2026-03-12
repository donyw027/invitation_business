<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'public_page/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/auth/login';
$route['admin/login'] = 'admin/auth/login';
$route['admin/logout'] = 'admin/auth/logout';
$route['admin/dashboard'] = 'admin/dashboard/index';

$route['admin/customers'] = 'admin/customers/index';
$route['admin/customers/create'] = 'admin/customers/create';
$route['admin/customers/store'] = 'admin/customers/store';
$route['admin/customers/edit/(:num)'] = 'admin/customers/edit/$1';
$route['admin/customers/update/(:num)'] = 'admin/customers/update/$1';
$route['admin/customers/delete/(:num)'] = 'admin/customers/delete/$1';

$route['admin/orders'] = 'admin/orders/index';
$route['admin/orders/create'] = 'admin/orders/create';
$route['admin/orders/store'] = 'admin/orders/store';
$route['admin/orders/edit/(:num)'] = 'admin/orders/edit/$1';
$route['admin/orders/update/(:num)'] = 'admin/orders/update/$1';
$route['admin/orders/delete/(:num)'] = 'admin/orders/delete/$1';

$route['admin/projects'] = 'admin/projects/index';
$route['admin/projects/create'] = 'admin/projects/create';
$route['admin/projects/store'] = 'admin/projects/store';
$route['admin/projects/edit/(:num)'] = 'admin/projects/edit/$1';
$route['admin/projects/update/(:num)'] = 'admin/projects/update/$1';
$route['admin/projects/publish/(:num)'] = 'admin/projects/publish/$1';
$route['admin/projects/unpublish/(:num)'] = 'admin/projects/unpublish/$1';
$route['admin/projects/delete/(:num)'] = 'admin/projects/delete/$1';

$route['admin/templates'] = 'admin/templates/index';


$route['admin/guests/index/(:num)'] = 'admin/guests/index/$1';
$route['admin/guests/store/(:num)'] = 'admin/guests/store/$1';
$route['admin/guests/import/(:num)'] = 'admin/guests/import/$1';
$route['admin/guests/import_template/(:num)'] = 'admin/guests/import_template/$1';
$route['admin/guests/delete/(:num)'] = 'admin/guests/delete/$1';

$route['rsvp/store'] = 'public_page/store_rsvp';
$route['wish/store'] = 'public_page/store_wish';

$route['preview/(:any)'] = 'public_page/preview/$1';
$route['i/(:any)/(:any)'] = 'public_page/view/$1/$2';
$route['i/(:any)'] = 'public_page/view/$1';
$route['card/(:any)'] = 'public_page/view/$1';
