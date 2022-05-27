<?php namespace App\Models;

use App\Models\MysqlModel;

class MuniModel extends MysqlModel
{
    static $id = 'IdMuni_Pk';
    static $tabla = 'municipalities';
    private const name = 'MuniName';
    static $cols = self::name;
    
    static function dataput($name)
    {
        $colsval = self::name . "'$name'";
        return $colsval;
    }
}
