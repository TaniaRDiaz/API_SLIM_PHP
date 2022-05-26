<?php
use App\Controllers\MuniCtrl;
use Slim\Routing\RouteCollectorProxy;

$app->group(
    '/muni',
    function (RouteCollectorProxy $muni) {
        $muni->post('',  MuniCtrl::class . ':newMuni');
        $muni->get('',  MuniCtrl::class . ':findAllMuni');
        $muni->get('/view',  MuniCtrl::class . ':viewMuni');
        $muni->get('/{idpk}', MuniCtrl::class . ':findOne');
        $muni->put('/{id}',  MuniCtrl::class . ':updateMuni');
        $muni->delete('/{id}',  MuniCtrl::class . ':delMuni');
    }
);
