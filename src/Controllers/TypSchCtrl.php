<?php namespace App\Controllers;

use App\Models\TypSchModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class TypSchCtrl
{

    function viewTypSch(Request $req, Response $res, $args)
    {
        $view = Twig::fromRequest($req);
        $data = [
            'tab' => "Tipos",
            'cat' => "type",
            'title' => "Tipos de Escuelas"
        ];

        return $view->render($res, 'typeschool.html', $data);
    }

    function findAllTypSch(Request $req, Response $res, $args)
    {
        $req =  TypSchModel::findAll();
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    function findOne(Request $req, Response $res, array $args)
    {
        $idprimary = $args['idpk'];
        $req = TypSchModel::findOne($idprimary);
        $res->getBody()->write(json_encode($req) );
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    function newTypSch(Request $req, Response $res, array $args)
    {
        $body = json_decode($req->getBody());
        //$body->estado="Guardado";
        $res->getBody()->write(json_encode($body));
        return $res
            ->withHeader('Content-Type', 'Application/json')
            ->withStatus(200);
    }
    function updateTypSch(Request $req, Response $res, array $args)
    {
        $id = $args['id'];
        $body = json_decode($req->getBody());
        $body->id = $id;
        $res->getBody()->write(json_encode($body));
        return $res
            ->withHeader('Content-Type', 'Application/json')
            ->withStatus(200);
    }
    function delTypSch(Request $req, Response $res, array $args)
    {
        $id = $args['id'];
        $res->getBody()->write('Se ha eliminado el id  ' . $id);
        return $res;
    }
}
