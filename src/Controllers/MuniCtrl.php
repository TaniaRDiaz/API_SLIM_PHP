<?php

namespace App\Controllers;

use App\Models\MuniModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;


class MuniCtrl
{
    function viewMuni(Request $req, Response $res, $args)
    {
        $view = Twig::fromRequest($req);
        $data = [
            'tab' => "Municipios",
            'cat' => "muni",
            'title' => "Municipios"
        ];
        return $view->render($res, 'muni.html', $data);
    }

    function findAllMuni(Request $req, Response $res, $args)
    {
        $req = MuniModel::findAll();
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    function findOne(Request $req, Response $res, array $args)
    {
        $idprimary = $args['idpk'];
        $req = MuniModel::findOne($idprimary);
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    function newMuni(Request $req, Response $res, array $args)
    {
        $body = json_decode($req->getBody());
        $vals = $body->MuniName;
        $req =  MuniModel::new(MuniModel::$cols, $vals);
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    function updateMuni(Request $req, Response $res, array $args)
    {
        $id = $args['id'];
        $body = json_decode($req->getBody());
        $vals = $body->MuniName;
        $colsval = MuniModel::dataput($vals);
        $req =  MuniModel::put($colsval, $id);
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
    function delMuni(Request $req, Response $res, array $args)
    {
        $id = $args['id'];
        $req =  MuniModel::delete($id);
        $res->getBody()->write(json_encode($req));
        $status = $res->getStatusCode();
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
}
