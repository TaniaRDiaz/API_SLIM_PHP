<?php namespace App\Models;

use App\Models\MysqlModel;

class TypSchModel extends MysqlModel
{
    static $tabla = 'types_school';
    static $id = 'IdTypeSchool_Pk';
    private const nametsch = 'NameTypeSchool';
    static $cols = self::nametsch;

    static function dataput($name)
    {
        $colsval = self::nametsch . "='$name'";
        return $colsval;
    }
}
