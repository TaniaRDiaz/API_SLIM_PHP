<?php
use App\Controllers\EduLevelCtrl;
use Slim\Routing\RouteCollectorProxy;

$app->group(
    '/edu-level',
    function (RouteCollectorProxy $level) {
        $level->post('', EduLevelCtrl::class . ':newEduLevl');
        $level->get('',  EduLevelCtrl::class . ':findAllEduLevel');
        $level->get('/view',  EduLevelCtrl::class . ':viewEduLevl');
        $level->get('/{idpk}', EduLevelCtrl::class . ':findOne');
        $level->put('/{id}',  EduLevelCtrl::class . ':updateEduLevl');
        $level->delete('/{id}',  EduLevelCtrl::class . ':delEduLevl');
        
    }
);