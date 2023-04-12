<?php defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'marketing';
// $route['default_controller'] = 'principal';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
// $route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8

// $route['diplomado/virtual/1'] = 'marketing/detalle_programa';

// ruta amigable para el usuario
// $route['marketing/detalle_programa/(:any)/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2/$3';
$route['tecnico-medio/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2';
$route['tecnico-superior/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2';
$route['licenciatura/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2';
$route['diplomado/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2';
$route['especialidad/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2';
$route['maestria/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2';
$route['maestr%C3%ADa/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2';
$route['doctorado/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2';
$route['post-doctorado/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2';
// para cuando ingresa carnet le redirecciona aun nuevo
// $route['marketing/detalle_programa/(:any)/(:any)/(:num)/(:any)'] = 'marketing/detalle_programa/$1/$2/$3/$4';

// $route['(:any)/(:any)/(:num)'] = 'marketing/detalle_programa/$1/$2/$3';

$route[sha1('notas_posgraduante/index')] = 'notas_posgraduante/index';
$route[sha1('prueba/index')] = 'prueba/index';
$route['notas_posgraduante/lista_posgraduante_excel/(:any)/(:any)'] = 'notas_posgraduante/lista_posgraduante_excel/$1/$2';
