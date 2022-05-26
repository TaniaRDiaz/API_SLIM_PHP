<?php namespace App\Models;

use App\Models\MysqlModel;

class EduLevelModel extends MysqlModel
{
    static $tabla = 'educational_levels';
    static $id = 'IdEduLevel_Pk';
    static $cols = 'NameEduLevel';
}
