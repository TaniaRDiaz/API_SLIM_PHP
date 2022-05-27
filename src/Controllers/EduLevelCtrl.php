<?php namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Models\EduLevelModel as LevelModel;

class EduLevelCtrl 
{
    function viewEduLevl(Request $req, Response $res, $args)
    {
        $view = Twig::fromRequest($req);
        $data = [
            'tab' => "Niveles",
            'cat' => "level",
            'title' => "Niveles Educativos"
        ];

        return $view->render($res, 'edulevel.html', $data);
    }
    function findAllEduLevel(Request $req, Response $res, $args)
    {
        $req=  LevelModel::findAll();        
        $res->getBody()->write(json_encode($req));
        return $res
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

   function findOne(Request $req, Response $res, array $args)
    {
        $id = $args['idpk'];
        $req=  LevelModel::findOne($id);
        $res->getBody()->write(json_encode($req));
        return $res
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);

    }
    
    function delEduLevl(Request $req, Response $res, array $args)
    {
        $id = $args['id'];
        $req=  LevelModel::delete($id);
        $res->getBody()->write(json_encode($req));
        return $res
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);

    }
    
    function newEduLevl(Request $req, Response $res, array $args)
    {
        $body = json_decode($req->getBody());
        $values= "'$body->NameEduLevel'";
        $req=  LevelModel::new( LevelModel::$cols, $values ); 
        $res->getBody()->write(json_encode($req));
        return $res
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);   
    }
 
    function updateEduLevl(Request $req, Response $res, array $args)
    {
        $id = $args['id'];
        $body = json_decode($req->getBody());
        $values= $body->NameEduLevel;
        $colsval=  LevelModel::dataput($values); 
        $req= LevelModel::put($colsval,$id);
        $res->getBody()->write(json_encode($req));
        return $res
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);  
    }
}
