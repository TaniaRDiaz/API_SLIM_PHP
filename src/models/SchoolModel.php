<?php namespace App\Models;

use App\Models\MysqlModel;

class SchoolModel extends MysqlModel
{
    static $tabla = 'schools';
    static $id = 'IdSchool_Pk';
    private const code = 'SchoolCode';
    private const namesch = 'NameSchool';
    private const addre = 'SchoolAddress';
    private const idtsch = 'IdTypeSchool_S_Fk';
    private const idlevel = 'IdEduLevel_S_Fk';
    private const idmuni = 'IdMuni_S_Fk';

    static $cols = self::code . "," . self::namesch . "," . self::addre . "," . self::idtsch . "," . self::idlevel . "," . self::idmuni;

    static function dataput($name, $address, $tsch, $edlevel, $muni)
    {
        $colsval = self::namesch . "='$name'," . self::addre . "='$address'," . self::idtsch . "='$tsch'," . self::idlevel . "='$edlevel'," . self::idmuni . "='$muni'";
        return $colsval;
    }
}
