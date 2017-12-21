<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['reviews/index'] = 'reviews/index';
$route['reviews/create'] = 'reviews/create';
$route['reviews/update'] = 'reviews/update';
$route['reviews/(:any)'] = 'reviews/view/$1';
$route['reviews'] = 'reviews/index';

$route['default_controller'] = 'pages/view';

$route['ratings'] = 'ratings/index';
$route['ratings/create'] = 'ratings/create';
$route['ratings/reviews/(:any)'] = 'ratings/reviews/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
