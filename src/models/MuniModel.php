<?php namespace App\Models;

use App\Models\MysqlModel;

class MuniModel extends MysqlModel
{
    static $id = 'IdMuni_Pk';
    static $tabla = 'municipalities';
    static $cols = 'MuniName';
    
}
