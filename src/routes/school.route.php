<?php
use App\Controllers\SchoolCtrl;
use Slim\Routing\RouteCollectorProxy;

$app->group(
    '/schools',
    function (RouteCollectorProxy $sch) {
        $sch->post('',  SchoolCtrl::class . ':newSchool');
        $sch->get('',  SchoolCtrl::class . ':findAllSchool');
        $sch->get('/view',  SchoolCtrl::class . ':viewSchool');
        $sch->get('/{idpk}', SchoolCtrl::class . ':findOne');
        $sch->put('/{id}',  SchoolCtrl::class . ':updateSch');
        $sch->delete('/{id}',  SchoolCtrl::class . ':delSch');
    }
);
