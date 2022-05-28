<?php namespace App\Models;

use App\Models\MysqlModel;

class EduLevelModel extends MysqlModel
{
    static $tabla = 'educational_levels';
    static $id = 'IdEduLevel_Pk';
    private const namelevel = 'NameEduLevel';
    static $cols = self::namelevel;

    static function dataput($name)
    {
        $colsval = self::namelevel . "='$name'";
        return $colsval;
    }
}
