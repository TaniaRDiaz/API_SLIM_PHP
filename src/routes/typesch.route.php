<?php
//namespace App\routes;

use App\Controllers\TypSchCtrl;
use Slim\Routing\RouteCollectorProxy;

$app->group(
    '/type-school',
    function (RouteCollectorProxy $typesc) {
        $typesc->post('', TypSchCtrl::class . ':newTypSch');
        $typesc->get('', TypSchCtrl::class . ':findAllTypSch');
        $typesc->get('/view', TypSchCtrl::class . ':viewTypSch');
        $typesc->get('/{idpk}', TypSchCtrl::class . ':findOne');
        $typesc->put('/{id}',  TypSchCtrl::class . ':updateTypSch');
        $typesc->delete('/{id}',  TypSchCtrl::class . ':delTypSch');
    }
);