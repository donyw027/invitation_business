<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'public_page/home';
$route['cara_order'] = 'public_page/cara_order';
$route['faq'] = 'public_page/faq';
$route['kontak'] = 'public_page/kontak';
$route['review'] = 'public_page/review';
$route['jastip-malang'] = 'public_page/jastip_malang';
$route['jastip-trawas'] = 'public_page/jastip_trawas';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/auth/login';
$route['admin/login'] = 'admin/auth/login';
$route['admin/logout'] = 'admin/auth/logout';
$route['admin/dashboard'] = 'admin/dashboard/index';
$route['admin/reports'] = 'admin/reports/index';

$route['admin/product-types'] = 'admin/product_types/index';
$route['admin/product-types/create'] = 'admin/product_types/create';
$route['admin/product-types/store'] = 'admin/product_types/store';
$route['admin/product-types/edit/(:num)'] = 'admin/product_types/edit/$1';
$route['admin/product-types/update/(:num)'] = 'admin/product_types/update/$1';
$route['admin/product-types/delete/(:num)'] = 'admin/product_types/delete/$1';

$route['admin/packages'] = 'admin/packages/index';
$route['admin/packages/create'] = 'admin/packages/create';
$route['admin/packages/store'] = 'admin/packages/store';
$route['admin/packages/edit/(:num)'] = 'admin/packages/edit/$1';
$route['admin/packages/update/(:num)'] = 'admin/packages/update/$1';
$route['admin/packages/delete/(:num)'] = 'admin/packages/delete/$1';

$route['admin/templates'] = 'admin/templates/index';
$route['admin/templates/create'] = 'admin/templates/create';
$route['admin/templates/store'] = 'admin/templates/store';
$route['admin/templates/edit/(:num)'] = 'admin/templates/edit/$1';
$route['admin/templates/update/(:num)'] = 'admin/templates/update/$1';
$route['admin/templates/delete/(:num)'] = 'admin/templates/delete/$1';

$route['admin/settings'] = 'admin/settings/index';

$route['admin/users'] = 'admin/users/index';
$route['admin/users/create'] = 'admin/users/create';
$route['admin/users/store'] = 'admin/users/store';
$route['admin/users/edit/(:num)'] = 'admin/users/edit/$1';
$route['admin/users/update/(:num)'] = 'admin/users/update/$1';
$route['admin/users/delete/(:num)'] = 'admin/users/delete/$1';

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

$route['admin/guests/index/(:num)'] = 'admin/guests/index/$1';
$route['admin/guests/store/(:num)'] = 'admin/guests/store/$1';
$route['admin/guests/import/(:num)'] = 'admin/guests/import/$1';
$route['admin/guests/import_template/(:num)'] = 'admin/guests/import_template/$1';
$route['admin/guests/delete/(:num)'] = 'admin/guests/delete/$1';

$route['admin/wishes'] = 'admin/wishes/index';
$route['admin/wishes/approve/(:num)'] = 'admin/wishes/approve/$1';
$route['admin/wishes/reject/(:num)'] = 'admin/wishes/reject/$1';
$route['admin/wishes/pending/(:num)'] = 'admin/wishes/pending/$1';

$route['rsvp/store'] = 'public_page/store_rsvp';
$route['wish/store'] = 'public_page/store_wish';

$route['preview/(:any)'] = 'public_page/preview/$1';
$route['i/(:any)/(:any)'] = 'public_page/view/$1/$2';
$route['i/(:any)'] = 'public_page/view/$1';
$route['card/(:any)'] = 'public_page/view/$1';


$route['admin/templates/clone/(:num)'] = 'admin/templates/clone_item/$1';
$route['admin/orders/invoice/(:num)'] = 'admin/orders/invoice/$1';
$route['admin/projects/add-gallery/(:num)'] = 'admin/projects/add_gallery/$1';
$route['admin/projects/delete-gallery/(:num)'] = 'admin/projects/delete_gallery/$1';
$route['admin/guests/export/(:num)'] = 'admin/guests/export_csv/$1';
$route['admin/reports/export-orders'] = 'admin/reports/export_orders';
$route['admin/reports/export-projects'] = 'admin/reports/export_projects';

$route['admin/projects/add-timeline/(:num)'] = 'admin/projects/add_timeline/$1';
$route['admin/projects/delete-timeline/(:num)'] = 'admin/projects/delete_timeline/$1';


$route['admin/orders/invoice-pdf/(:num)'] = 'admin/orders/invoice_pdf/$1';
$route['admin/reports/export-orders-xlsx'] = 'admin/reports/export_orders_xlsx';
$route['admin/reports/export-projects-xlsx'] = 'admin/reports/export_projects_xlsx';
$route['admin/guests/export-xlsx/(:num)'] = 'admin/guests/export_xlsx/$1';
$route['admin/projects/approve-timeline/(:num)'] = 'admin/projects/approve_timeline/$1';
$route['admin/projects/reject-timeline/(:num)'] = 'admin/projects/reject_timeline/$1';

$route['admin/orders/open-project/(:num)'] = 'admin/orders/open_project/$1';

$route['admin/quick-create'] = 'admin/quick_create/index';
$route['admin/quick-create/customer'] = 'admin/quick_create/customer';
$route['admin/quick-create/order'] = 'admin/quick_create/order';
$route['admin/quick-create/project'] = 'admin/quick_create/project';
$route['admin/quick-create/reset'] = 'admin/quick_create/reset';
