<?php
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, false, false);
$twig = Twig::create('..\src\templates', ['cache' => false]);
$app->add(TwigMiddleware::create($app, $twig));
$app->setBasePath('/proyectos_slim');

require 'routes/routes.php';
require 'config/config.php';

$app->run();
