<?php namespace App\Models;

use App\Models\MysqlModel;

class MuniModel extends MysqlModel
{
    static $tabla = 'municipalities';
    static $id = 'IdMuni_Pk';
    private const name = 'MuniName';
    static $cols = self::name;
    
    static function dataput($name)
    {
        $colsval = self::name . "'$name'";
        return $colsval;
    }
}
