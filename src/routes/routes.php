<?php
use App\Controllers\HomeController;

$app->get('/', HomeController::class . ':index');

require  'typesch.route.php';
require  'edulevel.route.php';
require  'muni.route.php';
require  'school.route.php';