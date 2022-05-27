<?php namespace App\Controllers;

use App\Models\SchoolModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class SchoolCtrl
{

    function viewSchool(Request $req, Response $res, $args)
    {
        $view = Twig::fromRequest($req);
        $data = [
            'tab' => "Escuelas",
            'cat' => "school",
            'title' => "Escuelas de Jutiapa"
        ];
        return $view->render($res, 'school.html', $data);
    }

    function findAllSchool(Request $req, Response $res, $args)
    {
        $req = SchoolModel::findAll();
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    function findOne(Request $req, Response $res, array $args)
    {
        $idprimary = $args['idpk'];
        $req = SchoolModel::findOne($idprimary);
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    function newSchool(Request $req, Response $res, array $args)
    {
        $code = uniqid();
        $body = json_decode($req->getBody());
        $name = $body->NameSchool;
        $address = $body->SchoolAddress;
        $tsch = $body->IdTypeSchool_S_Fk;
        $edlevel = $body->IdEduLevel_S_Fk;
        $muni = $body->IdMuni_S_Fk;

        $values = "'$code','$name','$address',$tsch,$edlevel,$muni";

        $req =  SchoolModel::new(SchoolModel::$cols, $values);
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
    
    function updateSch(Request $req, Response $res, array $args)
    {
        $id = $args['id'];
        $body = json_decode($req->getBody());
        $name = $body->NameSchool;
        $address = $body->SchoolAddress;
        $tsch = $body->IdTypeSchool_S_Fk;
        $edlevel = $body->IdEduLevel_S_Fk;
        $muni = $body->IdMuni_S_Fk;
        $colsval = SchoolModel::dataput($name,$address,$tsch,$edlevel,$muni);
        $req = SchoolModel::put($colsval, $id);
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
    function delSch(Request $req, Response $res, array $args)
    {
        $id = $args['id'];
        $req =  SchoolModel::delete($id);
        $res->getBody()->write(json_encode($req));
        $status = $res->getStatusCode();
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
}
