<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(:any)/test/all'] = 'test/ToastAll/index/$1';
$route['(:any)/test/e2e'] = '$1/test/E2ETest';
$route['default_controller'] = 'template';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
