<?php namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class HomeController
{
    function index(Request $request, Response $response, $args)
    {
        $view = Twig::fromRequest($request);
        $data = [
            'tab' => "Inicio",
            'cat' => "home",
            'title' => "Bienvenidos a las escuelas de Jutiapa"
        ];

        return $view->render($response, 'home.html', $data);
    }
}
